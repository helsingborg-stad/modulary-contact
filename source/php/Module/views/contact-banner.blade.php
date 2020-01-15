<?php 

    $items = array(
        (object) array(
            'title' => 'Chatta',
            'icon' => '',
            'content' => 'Få svar direkt - chatta med en kommunvägledare'
        ),

        (object) array(
            'title' => 'Mejla',
            'icon' => '',
            'content' => 'Få svar inom 24 timmar - kontaktcenter@helsingborg.se'
        ),

        (object) array(
            'title' => 'Besök',
            'icon' => '',
            'content' => 'Stortorget 17, Helsingborg'
        ),

        (object) array(
            'title' => 'Ring',
            'icon' => '',
            'content' => 'Prata med en kommunvägledare - 042-10 50 00'
        )
    ); 

?>

<div class="c-contact-banner">
    <div class="container">
        <div class="grid">

            <div class="grid-xs-8">
                <h2 class="c-contact-banner__heading">
                    <span class="c-contact-banner__heading-inner">{{ $headerMainContent }}</span>
                </h2>
                <p class="c-contact-banner__preamble">
                    <span class="c-contact-banner__preamble-inner">{{ $mainContent }}</span>
                </p>
            </div>

            <div class="grid-xs-4">

                <div class="c-contact-banner__hours">

                    @if ($headerBusinessHours)
                        <h3 class="c-contact-banner__hours-heading">
                            <span class="c-contact-banner__hours-heading-inner">{{ $headerBusinessHours }}</span>
                        </h3>
                    @endif

                    @if ($hoursList)
                        <ul class="c-contact-banner__hours-list">
                            @foreach ($hoursList as $listItem)
                                <li class="c-contact-banner__hours-list-item-0">
                                    <span class="c-contact-banner__hours-list-label">
                                        <span class="c-contact-banner__hours-weekdays">
                                            {{ $listItem['mod_contactbanner_weekdays'] }}
                                        </span>
                                        <span class="c-contact-banner__hours-time">
                                            {{ $listItem['mod_contactbanner_hours_from'] }}-{{ $listItem['mod_contactbanner_hours_to'] }}
                                        </span>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if ($abnormalitiesBusinessHours)
                        <div class="c-contact-banner__hours-exceptions">
                            <span class="small">
                                {{ $abnormalitiesBusinessHours }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="grid-xs-12">
                <div class="c-contact-banner__items">
                    @foreach ($items as $item)
                        <div class="c-contact-banner__item">
                            <div class="c-contact-banner__icon-wrapper">
                                <i class="c-icon c-icon--color- c-icon--size-inherit material-icons">chat</i>
                            </div>

                            <h3 class="c-typography c-typography__variant--h2">
                                <span class="c-typography__inner">{{ $item->title }}</span>
                            </h3>

                            <p class="c-typography u-small c-typography__variant--p">
                                <span class="c-typography__inner">{{ $item->content }}</span>
                            </p>

                            <a href="#" class="c-contact-banner__cta">{{ $item->title }} >></a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="grid-xs-12">
                <a href="#" class="c-contact-banner__info">Läs mer om helsingborg kontaktcenter</a>
            </div>

        </div>
    </div>
</div>