/**
 *
 * Copyright 2016 Google Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

var SCOPE_STRING = 'https://www.googleapis.com/auth/drive.readonly';

 /**
  * Trigger authentication using Google Sign-In then authenticate with the
  * server, apply profile change.
  */
app.signIn = function() {
  // Get `GoogleAuth` instance
  var auth2 = gapi.auth2.getAuthInstance();

  // Sign-In
  auth2.signIn()
  .then(authenticateWithServer)
  .then(changeProfile, function(error) {
    app.fire('show-toast', {
      text: 'Authentication failed.'
    });
  });
};

/**
 * Trigger sign-out using Google Sign-In
 */
app.signOut = function() {
  // Get `GoogleAuth` instance
  var auth2 = gapi.auth2.getAuthInstance();

  // Sign-Out
  fetch('/signout', {
    method: 'POST',
    credentials: 'include'
  }).then(function(resp) {
    if (resp.status === 200) {
      auth2.signOut()
      .then(changeProfile);
    } else {
      throw "Couldn't sign out";
    }
  }).catch(function(error) {
    app.fire('show-toast', {
      text: error
    });
  });
};

/**
 * Authenticate user by sending id_token to the server
 * @param  {GoogleUser} googleUser GoogleUser object obtained upon
 *                                 successful authentication
 * @return {Promise} Resolves when server successfully verifies
 *                            received id_token
 */
var authenticateWithServer = function(googleUser) {
  return new Promise(function(resolve) {
    // Using `FormData` as it is handy to use with POST
    var form = new FormData();
    var idToken = googleUser.getAuthResponse().id_token;
    if (!idToken) {
      throw 'Authentication failed.';
    }
    form.append('id_token', idToken)

    // Using `fetch` to POST `id_token`
    // You can of course use XHR
    return fetch('/validate', {
      method: 'POST',
      body: form,
      credentials: 'include'
    }).then(function(resp) {
      // When POST succeeded
      if (resp.status === 200) {
        resolve(googleUser);
      } else {
        throw 'Authentication failed.';
      }
    });
  });
};

/**
 * Invoked when sign-in status is changed
 * @param  {GoogleUser} googleUser GoogleUser object obtained upon
 *                                 successful authentication
 */
var changeProfile = function(googleUser) {
  // See if `GoogleUser` object is obtained
  // If not, the user is signed out
  if (googleUser) {
    // Get `BasicProfile` object
    var profile = googleUser.getBasicProfile();

    // Get user's basic profile information
    app.profile = {
      name: profile.getName(),
      email: profile.getEmail(),
      imageUrl: profile.getImageUrl()
    };

    app.fire('show-toast', {
      text: "You're signed in."
    });

    app.$.dialog.close();
  } else {
    // Remove profile information
    // Polymer will take care of the rest
    app.profile = null;
    app.fire('show-toast', {
      text: "You're signed out."
    });
  }
};

/**
 * Authorize and obtain *offline* access to Google Drive, then access.
 * @return {void}
 */
app.authorize = function() {
  // Get `GoogleAuth` instance
  var auth2 = gapi.auth2.getAuthInstance();

  // Get `GoogleUser` object
  var googleUser = auth2.currentUser.get();

  // See if this user has already granted permissions for the scope
  if (googleUser.hasGrantedScopes(SCOPE_STRING)) {
    // If already granted, make API calls
    accessDrive();
  } else {
    // Ask the user for a permission.
    // This is for server side API call
    googleUser.grantOfflineAccess({
      scope: SCOPE_STRING
    }).then(function(resp) {
      // When permissions are granted
      // Obtain auth code and embed it in a `FormData` instance
      var form = new FormData();
      form.append('code', resp.code);

      // Using `fetch` to POST auth code
      // You can of course use XHR
      fetch('/code', {
        method: 'POST',
        body: form,
        credentials: 'include'
      }).then(function(resp) {
        // When POST succeeded
        if (resp.status === 200) {
          // make API calls
          accessDrive();
        } else {
          throw 'Error';
        }
      }).catch(function(error) {
        // When POST failed
        app.fire('show-toast', {
          text: 'Authentication failed.'
        });
      });
    });
  }
};

/**
 * Make API calls to Google Drive via server. By filling `.files`,
 * list of files will be displayed by Polymer.
 * @return {void}
 */
var accessDrive = function() {
  // Using `fetch` to GET `/api`
  // You can of course use XHR
  fetch('/api', {
    credentials: 'include'
  }).then(function(result) {
    if (result.status !== 200) {
      throw 'Authorization required';
    }
    // `.json()` will return parsed JSON object
    return result.json();
  }).then(function(data) {
    console.log(data);
    app.files = data;
  }, function(error) {
    console.log(error);
    app.fire('show-toast', {
      text: error
    });
  });
};

// Initialization:
// Add `auth2` module
gapi.load('auth2', function() {
  // Initialize `auth2`
  gapi.auth2.init()
  .then(function(auth2) {
    // If the user is already signed in
    if (auth2.isSignedIn.get()) {
      var googleUser = auth2.currentUser.get();

      // Change user's profile information
      authenticateWithServer(googleUser)
      // Change user's profile information
      .then(changeProfile);
    }
  });
});

// Add `client` module to use JS API client libraries
gapi.load('client', function() {
  // Initialize specific API's client library
  gapi.client.load('drive', 'v3');
});
