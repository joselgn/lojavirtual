@section('conteudo-menu-lateral')

    <!-- BOTAO ACESSO AO CARRINHO DE COMPRAS -->
    @if (Route::has('login'))
        @auth
            <div class="well well-small"><a id="myCart" href="product_summary.html">
                    <img src="{{ asset('libraries/bootstrap-shop/themes/images/ico-cart.png') }}" alt="cart">3 Items in your cart
                    <span class="badge badge-warning pull-right">$155.00</span></a>
            </div>
        @endauth
    @endif

    <!-- CATEGORIAS -->
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <?php
            $menu = $layout['menu'];
            if(count($menu)>0){
                foreach($menu as $item){
                    if(count($item['submenu'])>0){
                        echo '<li class="subMenu open" style="cursor: pointer;"><a>'.$item["nome"].'<i class="icon-chevron-down"></i></a>';
                            //Percorre submenus
                            echo '<ul style="display:none">';
                            foreach ($item["submenu"] as $submenu){
                                    echo '<li><a href="/submenu/'.$submenu['id'].'"><i class="icon-chevron-right"></i>'.$submenu["nome"].'<i class="icon-link"></i></a></li>';
                            }//foreach submenu
                            echo '</ul>';
                        echo '</li>';//fecha menu
                    }else{
                        echo '<li><a href="/menu/'.$item['id'].'">'.$item["nome"].'<i class="icon-link"></i></a></li>';
                    }//if / else submenu
                }//foreach
            }else{
                echo '<li><a href="/">Sem categorias cadastradas <i class="icon-link"></i></li>';
            }//if / else categorias
        ?>
    <!-- CATEGORIAS END -->


@endsection
