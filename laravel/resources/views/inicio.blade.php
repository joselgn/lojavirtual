@extends('welcome') <!--Extende Layout Principal -->
@extends('slide') <!--Extende Slide Imagens -->
@extends('menu-lateral') <!--Extende menu lateral -->
@extends('slide-produtos') <!--Extende Layout de ultimos produtos cadastrados -->


@section('conteudo')

    <!-- LISTA TODOS OS PRODUTOS -->
    <h3> Conheça todos os nossos Produtos</h3>
    <hr class="soft"/>

    <hr class="soft"/>
    <form class="form-horizontal span6">
        <div class="control-group">
            <label class="control-label alignL">Ordenar por </label>
            <select>
                <option>Nome: A - Z</option>
                <option>Nome: Z - A</option>
                <option>Preço: Maior - Menor</option>
                <option>Preço: Menor - Maior</option>
            </select>
        </div>
    </form>


    <div id="myTab" class="pull-right">
        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <div class="tab-content">

        <!-- Produtos em Lista -->
        <?php
                if(isset($layout['allProds'])){
                    $listaProds =$layout['allProds'];
                    if(count($listaProds)>0){
                        echo '<div class="tab-pane" id="listView">';
                        foreach($listaProds as $prod){
                            echo '<div class="row"><div class="span2"><img src="'.asset($prod['img']).'" alt=""/></div>';
                            echo '<div class="span4"><h3>'.$prod['nome'].'</h3>';
                            echo '<p><a href="'.url("/ver-produto/".$prod['id']).'" class="btn btn-small pull-right"> + Detalhes</a><br/>';
                            echo $prod['desc'].'</p><br class="clr"/></div>';
                            echo '<div class="span3 alignR"><h3>'.$prod['preco'].'</h3>';
                            echo '<a href="'.url("/comprar/".$prod['id']).'" class="btn btn-large btn-primary"> Comprar <i class=" icon-shopping-cart"></i></a><br/>';
                            echo '</div></div><hr class="soft"/>';
                        }//foreach lista ṕrdutos
                        echo '</div><!-- Produtos em Lista FIM -->';

                        echo '<div class="tab-pane  active" id="blockView"><!-- Produtos em Bloco --><ul class="thumbnails">';
                        foreach($listaProds as $prod){
                            echo '<li class="span3"><div class="thumbnail">';
                            echo '<a href="'.url("/ver-produto/".$prod['id']).'"><img src="'.asset($prod['img']).'" alt=""/></a>';
                            echo '<div class="caption"><h5>'.$prod['nome'].'</h5><p><a class="btn btn-primary" href="#">'.$prod['preco'].'</a></p>';
                            echo '<h4 style="text-align:center"><a class="btn" href="'.url("/ver-produto/".$prod['id']).'"> <i class="icon-zoom-in"></i></a>';
                            echo '<a class="btn" href="'.url("/comprar/".$prod['id']).'">Comprar <i class="icon-shopping-cart"></i></a></h4>';
                            echo '</div></div></li>';
                        }//foreach lista ṕrdutos
                        echo '</ul><hr class="soft"/></div><!-- Produtos em Bloco FIM -->';
                    }else{
                        echo '<div class="row">Nenhum Produto para ser exibido</div>';
                    }//if / else

                }else{
                    echo '<div class="row">Nenhum Produto para ser exibido</div>';
                }//if isset prods
        ?>


        <!-- Produtos em Bloco

        <div class="tab-pane  active" id="blockView">
            <ul class="thumbnails">
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html"><img src="themes/images/products/3.jpg" alt=""/></a>
                        <div class="caption">
                            <h5>Manicure &amp; Pedicure</h5>
                            <p>
                                TESTE TESTE TESTE
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                        </div>
                    </div>
                </li>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html"><img src="themes/images/products/3.jpg" alt=""/></a>
                        <div class="caption">
                            <h5>Manicure &amp; Pedicure</h5>
                            <p>
                                I'm a paragraph. Click here
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                        </div>
                    </div>
                </li>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html"><img src="themes/images/products/3.jpg" alt=""/></a>
                        <div class="caption">
                            <h5>Manicure &amp; Pedicure</h5>
                            <p>
                                I'm a paragraph. Click here
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                        </div>
                    </div>
                </li>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html"><img src="themes/images/products/3.jpg" alt=""/></a>
                        <div class="caption">
                            <h5>Manicure &amp; Pedicure</h5>
                            <p>
                                I'm a paragraph. Click here
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                        </div>
                    </div>
                </li>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html"><img src="themes/images/products/3.jpg" alt=""/></a>
                        <div class="caption">
                            <h5>Manicure &amp; Pedicure</h5>
                            <p>
                                I'm a paragraph. Click here
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                        </div>
                    </div>
                </li>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html"><img src="themes/images/products/3.jpg" alt=""/></a>
                        <div class="caption">
                            <h5>Manicure &amp; Pedicure</h5>
                            <p>
                                I'm a paragraph. Click here
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;222.00</a></h4>
                        </div>
                    </div>
                </li>
            </ul>
            <hr class="soft"/>
        </div>-->

@endsection
