<?php use Illuminate\Support\Facades\Auth; ?>

<div id="site_header">
    <div class="top-icons">

        <?php if(Auth::check() && Auth::user() != null): ?>
            <img class="icon" id="account_panel_btn" src="{{asset('img/account.png')}}"><span id="header_username">{{Auth::user()->name}}</span>
        <?php else: ?>
            <img class="icon" id="account_panel_btn" src="{{asset('img/account.png')}}"><span id="header_username">Account</span>
        <?php endif; ?>

        <img id="ordered_list_panel_btn" class="icon" src="{{asset('img/bestellijst.png')}}"><span>Offertelijst <span id="offertlijst_count">0</span></span>
        <div class="search">
            <img id="search_icon" src="{{asset('img/zoekglas.png')}}">
            <input type="text" id="product_search_input" placeholder="Zoek hier een product">
        </div>
    </div>


    <Header>
        <h1><a href="/">CZ Borduurservice</a></h1>

        <nav class="user-nav">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/producten">Producten</a>
                </li>
                <li>
                    <a href="/bedrijfskleding">Bedrijfskleding</a>
                </li>
                <li>
                    <a href="/faq">Faq</a>
                </li>
                <li>
                    <a href="/contact">Contact</a>
                </li>
            </ul>

        </nav>
    </Header>
</div>