<div class="c-contact-banner">
    <div class="container">
        <div class="grid">

            <div class="grid-md-8">
                @isset($headerMainContent)
                    <h2 class="c-contact-banner__heading">
                        <span class="c-contact-banner__heading-inner">{{ $headerMainContent }}</span>
                    </h2>
                @endisset

                @isset($mainContent)
                    <p class="c-contact-banner__preamble">
                        <span class="c-contact-banner__preamble-inner">{{ $mainContent }}</span>
                    </p>
                @endisset
            </div>

            <div class="grid-md-4">

                <div class="c-contact-banner__hours">

                    @isset($headerBusinessHours)
                        <h3 class="c-contact-banner__hours-heading">
                            <span class="c-contact-banner__hours-heading-inner">{{ $headerBusinessHours }}</span>
                        </h3>
                    @endisset

                    @isset($hoursList)
                        <ul class="c-contact-banner__hours-list">
                            @foreach ($hoursList as $listItem)
                                <li class="c-contact-banner__hours-list-item-{{ $loop->index }}">
                                    <span class="c-contact-banner__hours-list-label">
                                        <span class="c-contact-banner__hours-weekdays">
                                            {{ $listItem->weekdays }}
                                        </span>
                                        <span class="c-contact-banner__hours-time">
                                            {{ $listItem->from }}-{{ $listItem->to }}
                                        </span>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endisset

                    @isset($abnormalitiesBusinessHours)
                        <div class="c-contact-banner__hours-exceptions">
                            <span class="small">
                                {{ $abnormalitiesBusinessHours }}
                            </span>
                        </div>
                    @endisset
                </div>
            </div>

            <!-- Items -->
            <div class="grid-xs-12">
                <div class="c-contact-banner__items">
                    <svg style="width:0;height:0;position:absolute;" aria-hidden="true" focusable="false">
                        <linearGradient id="c-contact-banner__icon-gradient" x2="1" y2="1">
                            <stop offset="0%" stop-color="#cb0050" />
                            <stop offset="100%" stop-color="#fa1a74" />
                        </linearGradient>
                    </svg>
                    @isset($ctaList)
                        @foreach ($ctaList as $listItem)
                            <div class="c-contact-banner__item">
                                <h3 class="c-contact-banner__item-title">
                                    <span class="c-contact-banner__icon">
                                        {!! $listItem->icon !!}
                                    </span>
                                    <span class="c-contact-banner__item-title-inner">
                                        {{ $listItem->title }}
                                    </span>
                                </h3>
                                <p class="c-contact-banner__item--content">
                                    <span class="c-contact-banner__item--content-inner">
                                        {{ $listItem->content }}
                                    </span>
                                </p>
                                
                                <a
                                    @isset($listItem->url)
                                        href="{{ $listItem->url }}"
                                    @endisset

                                    @isset($listItem->onclick)
                                        onclick="{{$listItem->onclick}}"
                                    @endisset
                                    class="c-contact-banner__cta"
                                >
                                {{$listItem->label}} <i class="pricon pricon-angle-right"></i>
                                </a>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>

            @isset($urlMoreInfo)
                <div class="grid-xs-12">
                    <a href="{!! $urlMoreInfo !!}" class="c-contact-banner__info">{{ $labelMoreInfo }} <i class="pricon pricon-chevron-right"></i></a>
                </div>
            @endisset

        </div>
    </div>
</div>
