
@extends('index')
@section('content')
    <section class="slider">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" style="padding-right:0px;">
                <div id="mainSlider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                                                                   <li data-target="#mainSlider" data-slide-to="0" class="                      active "></li>
                      
                                                                  <li data-target="#mainSlider" data-slide-to="1" class=""></li>
                      
                                                                </ol>
                    <div class="carousel-inner">
                                            
                                            
                      <div class="carousel-item 
                                            active ">
                        <img class="first-slide" src="http://localhost/mlm/public/images/slider/155163739480212.jpg" alt="First slide">
                        <div class="container">
                          <div class="carousel-caption">
                            <h1>Empower Your Future</h1>
                            <p>Reach your true potential by creating your result and the lifestyles you deserve and always wanted.</p>
                            <p><a class="btn btn-lg btn-pink" href="#" role="button">Sign up today</a></p>
                          </div>
                        </div>
                      </div>
                      
                                                                  
                      <div class="carousel-item 
                      ">
                        <img class="first-slide" src="http://localhost/mlm/public/images/slider/155163741718139.jpg" alt="First slide">
                        <div class="container">
                          <div class="carousel-caption">
                            <h1>Learn, Earn &amp; Dominate The Financial Market</h1>
                            <p>Reach your true potential by creating your result and the lifestyles you deserve and always wanted.</p>
                            <p><a class="btn btn-lg btn-pink" href="#" role="button">Sign up today</a></p>
                          </div>
                        </div>
                      </div>
                      
                                            
                      


                    </div>
                    <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
        </div>
      </div>
    </div>
    </section>
 <div id="demo"  style="text-align: center;font-size: 60px;font-weight: bold;color:#b8aa84"></div>
 
    <section class="intro" style="padding: 29px 0px 100px 0px;">
      <div class="container">
      <div class="row text-center">
        <div class="col-md-12 wow fadeIn" data-wow-duration="1s">
         <p  style="font-size:22px;">Let us help you raise the funds you need, whether it be to start a new business, take the vacation of your dreams, or to pay the rent.  We got you covered!</p>

                  </div>
        </div>
        
      </div>
    </section>

    <section class="paralaxOne" id="aboutus">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="wow bounceInLeft" data-wow-duration="1s">Our Approach</h2>
            <h4 class="wow bounceInRight" data-wow-duration="1s">Our Primary Goal is to help people.  Crowdfunding is a way for like minded individuals to gather together and leverage money into helping each other raise the funds needed to start a business, go on vacation, buy a house, pay the rent, or anything else you may need to raise funds for.</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="info" id="why">
      <div class="container">
        <div class="row text-center wow fadeIn">
          <div class="col-md-12">
            <h2>OUR STORY</h2>
            <p style="text-align: justify;">In November 2017,  I joined a home business, a mlm, as my team grew i realized that i wanted to help them grow by doing more than just teaching them what and how to post ads.  I started building capture pages (opt’ins) for my team, then for their friends, and over time… anyone that needed them and i started charging $10 a month.  But after a while i felt like i could do more, and i realized that the one thing we all had in common was, “We needed Leads”.  At this point, InternetWealth4U was born.  As I started the process of owning my own business I got into crowdfunding, this was another way I can help people.  Our Primary goal is to keep creating multiple matrixes to ultimately give everyone a profit overall.  This process of multi-matrix is still being designed and should be fully developed by Jul of 2020.  Join us in our current platform to be notified of early registration into our new multi-platform.</p>
          <p><b>"Find Out What We Can Do For You and Your Dreams…. Join Us Today!!"</b></p>
          <p> <b>Jason Bradley</b> <br> Founder & CEO </p>
          </div>
       
        </div>
      </div>
    </section>

    <section class="paralaxTwo">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12 wow fadeIn" data-wow-duration="1s">
            <h4 class="line-1 anim-typewriter">Take the emotion (greed and fear) out of your trade while you are learning.</h4>
          </div>
        </div>
      </div>
    </section>

    <section id="about">
      <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-7 wow fadeIn" data-wow-duration="1.5s">
            <h2 class="text-left">Infinite-Funds</h2>
            <p style="text-align: left;font-weight:bold">Crowdfunding Platform</p>
            <li>Registration Free</li>
            <li>Become active by buying a $0.50 position</li>
            <li>Additional positions are $0.50</li>
            <li>Active Members have unlimited access to our marketing/advertising ebooks</li>
          </div>
        <div class="col-md-2"></div>

        </div>
      </div>
    </section>
    @section('js')
<script>
$('#demo').html('Crowdfunding');
</script>
    @endsection
    @endsection