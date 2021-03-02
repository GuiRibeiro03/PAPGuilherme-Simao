<?php
include_once ("includes/body.inc.php");
top();
?>


<section class="store">
    <div style="text-align: center"> <h1 style="text-shadow: 2px 2px 0px #FF0000; padding-top:20px " ><strong>The Last of us Parte II</strong></h1></div>

    <br>
    <br>
    <div class="container-md">
        <img src="img/jogos/TloU2.jpg" style=" padding-top: 40px;">
        <div style="float: right;  width: 700px; height: 200px">
            <section class="details-post-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 p-0">
                            <div class="details-text" style="width: 850px">
                                <div class="dt-overall-rating">
                                    <div class="or-heading">
                                        <div class="or-item" >
                                            <div class="or-item" >
                                                <div class="or-loader">
                                                    <div class="loader-circle-wrap">
                                                        <div class="loader-circle">
                                                            <span class="circle-progress-2" data-cpid="circle1" data-cpvalue="88"  data-cpcolor="#4bcf13"></span>
                                                            <div class="review-point">
                                                                <div style="padding-left: 10px; padding-top: 10px">94</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="or-loader">

                                                    <div class="loader-circle-wrap">
                                                        <div class="loader-circle">
                                                            <span class="circle-progress-2" data-cpid="circle2" data-cpvalue="94"  data-cpcolor="#c20000"></span>
                                                            <div class="review-point">
                                                                <div style="padding-left: 10px; padding-top: 10px">94</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="or-skill">
                                            <div class="skill-item">
                                                <p>Design</p>
                                                <div id="bar-1" class="barfiller">
                                                    <span class="fill" data-percentage="90"></span>
                                                    <div class="tipWrap" style="display: inline;">
                                                        <span class="tip"></span>
                                                        <span class="bar-point"><b>90</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="skill-item">
                                                <p>Graficos</p>
                                                <div id="bar-2" class="barfiller">
                                                    <span class="fill" data-percentage="84"></span>
                                                    <div class="tipWrap" style="display: inline;">
                                                        <span class="tip"></span>
                                                        <span class="bar-point"><b>84</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="skill-item">
                                                <p>História</p>
                                                <div id="bar-3" class="barfiller">
                                                    <span class="fill" data-percentage="94"></span>
                                                    <div class="tipWrap" style="display: inline;">
                                                        <span class="tip"></span>
                                                        <span class="bar-point"><b>94</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="skill-item">
                                                <p>Sountrack</p>
                                                <div id="bar-4" class="barfiller">
                                                    <span class="fill" data-percentage="85"></span>
                                                    <div class="tipWrap" style="display: inline;">
                                                        <span class="tip"></span>
                                                        <span class="bar-point"><b>85</b></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="or-qualities">
                                            <div class="qualities-item">
                                                <p>The Goods</p>
                                                <ul>
                                                    <li><i class="fa fa-check"></i> Grafismo da Cidade.</li>
                                                    <li><i class="fa fa-check"></i> Recursos.</li>

                                                    <li><i class="fa fa-check"></i> Combate.</li>
                                                    <li><i class="fa fa-check"></i> Imersão.</li>

                                                </ul>
                                            </div>
                                            <div class="qualities-item bad-item">
                                                <p>The bads</p>
                                                <ul>
                                                    <li><i class="fa fa-close"></i> Abby</li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div style="color: #FFFFFF; font-size: 50px;"><strong><span >69,90 €</span></strong></div> <span style="color: #FFFFFF">Qtn:</span><input type="number" id="quantity" name="quantity" min="1" value="1" max="5" style="width: 50px">
        <p></p>
        <button class="btn btn-danger  cart-button" style="color: #dc3545"><strong>
                <span class="add-to-cart" style="color: #FFFFFF">Adicionar ao Carrinho</span>
                <span class="added" style="color: #FFFFFF">Adicionado<i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
            </strong>

        </button>

        <script>
            const cartButtons=document.querySelectorAll('.cart-button');
            cartButtons.forEach(button => {
                button.addEventListener('click',cartClicker);
            });

            function cartClicker() {
                var cart=0;
                let button = this;
                button.classList.add('clicked');
                document.getElementById("bdg1").innerHTML = cart + 1;
            }
        </script>





        <section class="store" style="color: #FFFFFF; font-size: 25px; margin-top: 200px; margin-bottom: 200px;">
            <div style="width: 500px; height: 100%; border: 1px #FFFFFF; background-color: black; padding: 10px 50px">
                <div><strong>Conteudo:</strong></div>
                <hr>
                <ul>
                    <li><strong>Jogo - The Last of us Parte II</strong></li>
                </ul>
            </div>



        </section>
    </div>

</section>


<?php
bottom();
?>