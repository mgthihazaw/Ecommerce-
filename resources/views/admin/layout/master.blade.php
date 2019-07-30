@include('admin.layout.header')
        <div class="page-wrapper">
                
                @include('admin.layout.leftsidebar')
                
        
                
                <div class="page-container2">
                    
                    @include('admin.layout.nav')
                    @include('admin.layout.rightsidebar')
                    <div class="content mt-5 pt-5 mx-5">
                            @include('admin.messages.message')
                    @yield('content')
                    </div>
        
                    <section >
                            <div class="container-fluid ">
                            <div class="row">
                            <div class="col-md-12">
                            <div class="copyright">
                            <p>Copyright © 2018 Ecommerce. All rights reserved.</p>
                            </div>
                            </div>
                            </div>
                            </div>
                    </section>
                
                    
                </div>
        
        </div>
           
            @include('admin.layout.footer')