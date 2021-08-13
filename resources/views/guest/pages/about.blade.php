@extends('layouts.guest.blog')

@section('content')

   <!--
    ===================
       ABOUT
    ===================
    -->
    <section class="mh-about" id="mh-about">
        <div class="container">
            <div class="row section-separator">
                <div class="col-sm-12 text-center section-title wow fadeInUp" data-wow-duration="0.8s"
                     data-wow-delay="0.2s">
                    <h2>{{ __('guest/home.about me') }}</h2>
                </div>
                <div class="col-sm-12">
                    <div class="mh-about-inner">
                        <p class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            {!! __('guest/presentation.text') !!}
                        </p>
                        {{--<div class="mh-about-tag wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <ul>
                                <li><span>php</span></li>
                                <li><span>html</span></li>
                                <li><span>css</span></li>
                                <li><span>php</span></li>
                                <li><span>wordpress</span></li>
                                <li><span>React</span></li>
                                <li><span>Javascript</span></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>

        </div>
    </section>


        <!--
    ===================
       SERVICE
    ===================
    -->
    <section class="animate__backInLeft mh-testimonial" id="mh-testimonial">
        <div class="home-v-img">
            <div class="container">
                <div class="row section-separator">
                    <div class="col-sm-12 section-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h3>{{ __('guest/home.skills domains') }}</h3>
                    </div>
                    <div class="col-sm-12 wow fadeInUp" id="mh-client-review" data-wow-duration="0.8s"
                         data-wow-delay="0.3s">
                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.holistic health.name') }}</h4>

                                <p>{{ __("guest/home.skills domains details.holistic health.description") }}</p>

                            </div>
                        </div>
                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.relationship Marketing.name') }}</h4>

                                <p>{{ __('guest/home.skills domains details.relationship Marketing.description') }}</p>

                            </div>
                        </div>

                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.the Blockchain.name') }}</h4>

                                <p>{{ __('guest/home.skills domains details.the Blockchain.description') }}</p>

                            </div>
                        </div>
                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.cryptocurrency.name') }}</h4>

                                <p>{{ __('guest/home.skills domains details.cryptocurrency.description') }}</p>

                            </div>
                        </div>
                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.training.name') }}</h4>

                                <p>{{ __("guest/home.skills domains details.training.description") }}</p>

                            </div>
                        </div>

                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.project management.name') }}</h4>

                                <p>{{ __('guest/home.skills domains details.project management.description') }}</p>
                            </div>
                        </div>

                        <div class="each-client-item">
                            <div class="mh-client-item dark-bg black-shadow-1">
                                <img src="#" alt="" class="img-fluid">
                                <h4>{{ __('guest/home.skills domains details.the sale.name') }}</h4>

                                <p>{{ __('guest/home.skills domains details.the sale.description') }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mh-experince image-bg featured-img-one" id="mh-experience">
        <div class="img-color-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                        <div class="mh-education">
                            <h3 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                {{ __('guest/training.training') }}
                            </h3>
                            <div id="progress-bar-container">
                                <ul>
                                    <li class="step step01">
                                        <div class="step-inner">1997</div>
                                    </li>
                                    <li class="step step02">
                                        <div class="step-inner">2007</div>
                                    </li>
                                    <li class="step step03">
                                        <div class="step-inner">2018</div>
                                    </li>
                                    <li class="step step04">
                                        <div class="step-inner">2019</div>
                                    </li>
                                    <li class="step step05 active">
                                        <div class="step-inner">2020</div>
                                    </li>
                                </ul>

                                <div id="line">
                                    <div id="line-progress"></div>
                                </div>
                            </div>
                            <div class="mh-education-deatils" id="progress-content-section">
                                <!-- Education Institutes-->
                                <div class="mh-education-item dark-bg section-content discovery"
                                     data-wow-duration="0.8s" data-wow-delay="0.3s">
                                    <h4>
                                        {!!  __('guest/training.training details.1997') !!}
                                    </h4>
                                    <div class="mh-eduyear">1997</div>
                                </div>
                                <!-- Education Institutes-->
                                <div class="mh-education-item dark-bg section-content strategy">
                                    {!! __('guest/training.training details.1997-2007') !!}
                                    <div class="mh-eduyear">Janvier 2007</div>
                                </div>
                                <!-- Education Institutes-->
                                <div class="mh-education-item dark-bg section-content creative">
                                    {!! __('guest/training.training details.2016-2017') !!}
                                    <div class="mh-eduyear">2018</div>
                                </div>
                                <!-- Education Institutes-->
                                <div class="mh-education-item dark-bg section-content production">
                                    {!! __('guest/training.training details.2018-2019') !!}
                                    <div class="mh-eduyear">2018 - 2019</div>
                                </div>
                                <!-- Education Institutes-->
                                <div class="mh-education-item dark-bg wow section-content analysis active">
                                    {!! __('guest/training.training details.2019-2020') !!}
                                    <div class="mh-eduyear">2019 - 2020</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                        <div class="mh-education">
                            <h3 class="wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                {{ __('guest/professional_experiences.professional experiences') }}
                            </h3>
                            <div id="progress-bar-container">
                                <ul>
                                    <li class="steps step001">
                                        <div class="step-inner">2007</div>
                                    </li>
                                    <li class="steps step002">
                                        <div class="step-inner">2010</div>
                                    </li>
                                    <li class="steps step003">
                                        <div class="step-inner">2013</div>
                                    </li>
                                    <li class="steps step004">
                                        <div class="step-inner">2015</div>
                                    </li>
                                    <li class="steps step005 active">
                                        <div class="step-inner">2020</div>
                                    </li>
                                </ul>

                                <div id="line">
                                    <div id="line-progress1"></div>
                                </div>
                            </div>
                            <div class="mh-education-deatils" id="progress-content-section">
                                {!! __('guest/professional_experiences.details') !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--
    ===================
       SKILLS
    ===================
    -->
    <section class="mh-skills" id="mh-skills">
        <div class="home-v-img">
            <div class="container">
                <div class="row section-separator">
                    <div class="section-title text-center col-sm-12">
                        <!--<h2>Skills</h2>-->
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mh-skills-inner">
                            <div class="mh-professional-skill wow fadeInUp" data-wow-duration="0.8s"
                                 data-wow-delay="0.3s">
                                <h3>{{ __('guest/technical_skills.technical skills') }}</h3>
                                <div class="each-skills">
                                    {!! __('guest/technical_skills.details') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="mh-professional-skills wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                            <h3>{{ __('guest/technical_skills.skills') }}</h3>
                            <ul class="mh-professional-progress">
                                {!! __('guest/technical_skills.skills details') !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection