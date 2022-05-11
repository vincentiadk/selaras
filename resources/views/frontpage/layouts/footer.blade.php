<footer class="footer primary-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
               <div class="widget clearfix">
                <h4 class="widget-title">Subscribe</h4>
                <div class="newsletter-widget">
                    <p>You can opt out of our newsletters at any time. See our privacy policy.</p>
                    <form class="form-inline" role="search">
                        <div class="form-1">
                            <input type="text" class="form-control" placeholder="Enter email here..">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i></button>
                        </div>
                    </form>
                </div><!-- end newsletter -->
            </div><!-- end widget -->
        </div><!-- end col -->
        <div class="col-md-2 col-sm-2">
            <div class="widget clearfix">
                <h4 class="widget-title">Company</h4>
                <ul>
                    @foreach($data['pages'] as $page)
                    <li><a href="/page/{{$page->slug}}">{{$page->title}}</a></li>
                    @endforeach
                    <li><a href="/blog">Blog</a></li>
                </ul>
            </div><!-- end widget -->
        </div><!-- end col -->

        <div class="col-md-2 col-sm-2">
            <div class="widget clearfix">
                <h4 class="widget-title">Services</h4>
                <ul>
                    @foreach($data['categories'] as $category)
                    <li><a href="/service/{{$category->slug}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div><!-- end widget -->
        </div><!-- end col -->
        <div class="col-md-2 col-sm-2">
         <div class="widget clearfix">
            <h4 class="widget-title">Address</h4>
            <ul>
                <li>Jl. Sentrasari Mall C1 no 63 Bandung</li>
                <li> Jawa Barat
                </li>
            </ul>
        </div>
    </div>
</div><!-- end row -->
</div><!-- end container -->
</footer><!-- end primary-footer -->

<footer class="footer secondary-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <p>2010 - 2022 &copy; CV. Selaras Strategi Performa. All Rights Reserved</p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end second footer -->