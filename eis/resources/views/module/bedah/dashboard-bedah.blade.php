@extends('template.bedah')
@section('css')
<style>
    .pcoded .pcoded-inner-content {
        padding: 10px 0 10px 0;
    }

    .class-icon {
        font-size: 50px;

        padding: 5px;
        border-radius: 5px;
        background: #bcbcbc8a;
    }

    .pad {
        padding-top: 3rem;
    }

    @media (min-width: 992px) {
        .pad {
            padding-top: 1.8rem;
        }
    }

    .modal-lg .kons {
        width: 1140px;
    }

    @media only screen and (max-width: 575px) {
        .latest-update-card .card-block .latest-update-box .update-meta {
            z-index: 2;
            min-width: 0;
            text-align: left !important;
            margin-bottom: 15px;
            border-top: 1px solid #f1f1f1;
            padding-top: 15px;
        }
    }

    #return-to-top {
        z-index: 999;
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #404e67;
        width: 50px;
        height: 50px;
        display: block;
        text-decoration: none;
        -webkit-border-radius: 35px;
        -moz-border-radius: 35px;
        border-radius: 35px;
        display: none;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    #return-to-top i {
        color: #fff;
        margin: 0;
        position: relative;
        left: 16px;
        top: 13px;
        font-size: 19px;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    #return-to-top:hover {
        background: rgba(0, 0, 0, 0.62);
    }

    #return-to-top:hover i {
        color: #fff;
        top: 5px;
    }

    .icons-alert:before {
        color: #fff;
        content: '\f027';
        font-family: 'IcoFont' !important;
        font-size: 16px;
        left: -30px;
        position: absolute;
        top: 28px;
    }

    .card {
        border-radius: 25px;
        -webkit-box-shadow: 0 1px 20px 0 rgb(69 90 100 / 8%);
        box-shadow: 0 1px 20px 0 rgb(69 90 100 / 8%);
        border: none;
        margin-bottom: 30px;
    }
</style>
@endsection
@section('content-body')
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<div class="page-wrapper pad" style="padding: 50px 100px 0 100px;">
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="alert alert-info icons-alert" style="border-radius: 25px;">
                    <h3 style="margin-top: 14px;"><strong>DASHBOARD BEDAH</strong></h3>
                </div>
            </div>
            @forelse($getDokter as $d)
            <div class="col-md-12 col-xl-4">
                <div class="card widget-statstic-card">
                    <div class="card-header">
                        <div class="card-header-left">
                            <h5 style="font-size: 22px;">{{$d->namapasien}}</h5>
                            <span class="f-right bg-c-yellow" style="font-size: 23px;color:#fff">{{$d->rownum}}</span>
                            <p class="p-t-5 m-b-0 text-c-black" style="font-size: 20px;">
                                Norm / Registrasi : {{$d->nocm}} / {{$d->noregistrasi}} <br />                               
                                Ruang Rawat : {{$d->ruangrawat}}
                            </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <i class="feather icon-users st-icon bg-c-yellow"></i>
                        <div class="text-left">
                            <i class="feather icon-calendar f-30 text-c-green"></i>
                            <h3 class="d-inline-block" style="font-size: 20px;">{{$d->tgloperasi}}</h3>                            
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    setTimeout(function() {
        window.location.reload()
    }, 120000);
    // ===== Scroll to Top ====
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() { // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 500);
    });

    function scrollTopBottom() {
        $('html, body').animate({
            scrollTop: $(document).height() - $(window).height()
        }, 150000, function() {
            $(this).animate({
                scrollTop: 0
            }, 150000);
        });
    }
    scrollTopBottom()

    setInterval(function() {
        scrollTopBottom()

    }, 350000);


</script>

@endsection

