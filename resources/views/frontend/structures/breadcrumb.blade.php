<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    @if(!empty($subtitle))
                    <h1 class="text-capitalize">{{$subtitle}}</h1>
                    @elseif(!empty($title))
                        <h1 class="text-capitalize">{{$title}}</h1>
                    @endif

                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    @if(!empty($title))
                    <li class="breadcrumb-item active text-capitalize">{{$title}}</li>
                    @endif
                    @if(!empty($subtitle))
                        <li class="breadcrumb-item active text-capitalize">{{$subtitle}}</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
    <!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
