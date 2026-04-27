@extends('frontend.layouts.app')

@section('title', 'About - ' . ($settings->company_name ?? 'E-Sheba'))

@section('styles')
<style>
.list-members {
  width: 80%;
  margin: 4% auto;
  display: flex;
  flex-wrap: wrap;
}

.member {
  flex-basis: 50%;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.member-image {
  width: 50%;
  height: 100%;
  cursor: pointer;
  overflow: hidden;
  position: relative;
}

.member-image img {
  width: 100%;
  height: 100%;
  transition: 1s;
  object-fit: cover;
}

.member-image:hover img {
  transform: scale(1.1);
}

.member-info {
  width: 50%;
  text-align: center;
}

.member-info p {
  margin: 20px 0;
  text-align: center;
}

.member-info h3 {
  color: var(--primary-blue);
}

.social-link .fa {
  width: 35px;
  height: 35px;
  line-height: 35px;
  border: 2px solid var(--primary-blue);
  margin: 0 7px;
  cursor: pointer;
  transition: all 0.5s;
  border-radius: 50%;
  color: var(--primary-blue);
}

.social-link .fa:hover {
  background: var(--primary-blue);
  color: white;
  transform: translateY(-7px);
  box-shadow: 0 5px 15px rgba(0, 128, 255, 0.3);
}

.member-image::after {
  content: '';
  border-top: 20px solid transparent;
  border-bottom: 20px solid transparent;
  border-right: 15px solid white;
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
}

@media screen and (min-width: 771px) {
  .member:nth-child(4n+3) .member-info,
  .member:nth-child(4n+4) .member-info {
    order: 1;
  }
  .member:nth-child(4n+3) .member-image,
  .member:nth-child(4n+4) .member-image {
    order: 2;
  }

  .member:nth-child(4n+3) .member-image::after,
  .member:nth-child(4n+4) .member-image::after {
    left: 0;
    right: auto;
    transform: translateY(-50%) rotateZ(180deg);
  }
}

@media screen and (max-width: 770px) {
  .list-members {
    width: 95%;
  }
  .member {
    flex-basis: 100%;
    font-size: 14px;
  }
  .social-link .fa {
    width: 30px;
    height: 30px;
    line-height: 30px;
  }

  .member:nth-child(even) .member-info {
    order: 1;
  }
  .member:nth-child(even) .member-image {
    order: 2;
  }
  
  .member:nth-child(even) .member-image::after {
    left: 0;
    right: auto;
    transform: translateY(-50%) rotateZ(180deg);
  }
}
</style>
@endsection

@section('content')
<!-- HEADER TREE -->
<section class="header-tree" data-speed="8" data-type="background">
  <h2 class="hidden">Header tree</h2>
  <!-- parallax background -->
  <div class="cover-1" data-type="sprite" data-offsetY="-700" data-Xposition="50%" data-speed="-2"></div>
  <!-- .container -->
  <div class="container">
    <!-- .row -->
    <div class="row">
      <!-- .col-md-12 -->
      <div class="col-md-12">
        <ul class="breadcrumb clearfix mar-top-3x">
          <li><a class="link text-success" href="{{ url('/') }}">{{ $settings->company_name ?? 'E-SHEBA' }}</a></li>
          <li><a class="link" href="#"> সম্পর্কে </a></li>
        </ul>
      </div>
      <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- HEADER TREE END -->
<div style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 50%, var(--primary-cyan) 100%);">

  <!-- .container -->
  <div class="container-fluid">
    <!-- .row -->
    <div class="row">
      <!-- .col-md-12 -->
      <div class="col-md-12">
        <!-- Team introduction text -->
        <!-- .row -->
        <div class="row">
          <div class="col-sm-12">
            <h1 class="text-uppercase wow fadeInDown text-center"  data-wow-duration=".8s" data-wow-delay=".2s" style="color: white; font-weight: 700;">আমাদের সম্পর্কে</h1>
            <p class="text-center">
              <i class="text-muted text-capitalize">আমাদের পরিচয়</i>
            </p>
            <div class="text-center">
              <span class="separator">
                <i class="icon icon-small iline1-multiple10 text-primary no-margin"></i>
              </span>
            </div>
            <p class="wow fadeInUp text-center"  data-wow-duration="1s" data-wow-delay=".3s">
              {{ $settings->about_company ?? 'আমরা একটি ডিজিটাল সেবা প্রদানকারী সংস্থা যা আপনার ব্যবসাকে ডিজিটাল যুগে এগিয়ে নিয়ে যেতে সাহায্য করে।' }}
            </p>
          </div>
        </div>
        <!-- /.row -->
        <!--/ Team introduction text -->
      </div>
      <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
@endsection