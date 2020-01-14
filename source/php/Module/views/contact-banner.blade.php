<?php 

    $items = array(
        array(
            'title' => 'Ring',
            'icon' => '',
            'contact' => 'Blaha blaha'
        ),

        array(
            'title' => 'Ring',
            'icon' => '',
            'contact' => 'Blaha blaha'
        ),

        array(
            'title' => 'Ring',
            'icon' => '',
            'contact' => 'Blaha blaha'
        ),

        array(
            'title' => 'Ring',
            'icon' => '',
            'contact' => 'Blaha blaha'
        )
    ); 

    $timerows = array(
        '',
        '',
        ''
    ); 

    $timeDetails = ""; 
    $mainContent = ""; 
?>

<div class="c-contact-banner">
    <div class="container">
        <div class="grid">

            <div class="grid-xs-8">
                <h2 class="c-typography c-typography__variant--h2">
                    <span class="c-typography__inner">Kontakta kommunen - En väg in</span>
                </h2>
                <p class="c-typography c-typography__variant--p">
                    <span class="c-typography__inner">När du kontaktar oss är det kommunvägledarna på Helsingborg kontaktcenter som tar hand om dina frågor.</span>
                </p>
            </div>
            
            <div class="grid-xs-4">
                <h3 class="c-typography c-typography__variant--h5">
                    <span class="c-typography__inner">Kontakta kommunen - En väg in</span>
                </h3>
                <ul class="c-listing u-unlist">
                    <li class="c-listing__item c-listing__item-0">
                        <span class="c-listing__label">This is a list label for item 1</span>
                    </li>
                    <li class="c-listing__item c-listing__item-1">
                        <span class="c-listing__label">This is a list label for item 2</span>
                    </li>
                </ul>
            </div>

            <div class="grid-xs-12">
                <div class="c-contact-banner__items">
                    @foreach ($items as $item)
                        <div class="c-contact-banner__item">
                            <div class="c-contact-banner__icon-wrapper">
                                <i class="c-icon c-icon--color c-icon--size-inherit material-icons">chat</i>
                            </div>
                            <h3 class="c-typography c-typography__variant--h2">
                                <span class="c-typography__inner">Chatta</span>
                            </h3>
                            <p class="c-typography u-small c-typography__variant--p">
                                <span class="c-typography__inner">Få svar direkt - chatta med en kommunvägledare.</span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
