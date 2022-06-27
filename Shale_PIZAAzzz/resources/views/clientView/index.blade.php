@extends('masters.clientMaster')
@section('main')
    <!-- Start Content -->
    <div id="home" class="w3-content">
        <!-- Navbar (Sits on top) -->
        <div class="w3-top w3-bar-sm w3-xlarge w3-black w3-opacity-min">
            <a href="#home" class="w3-bar-item w3-button">HOME</a>
            <div class="dropdown">
                <button class="w3-bar-item w3-button">Menu</button>
                <div class="dropdown-content">
                    <a href="#">Pizza</a>
                    <a href="#">Garlic Breads</a>
                    <a href="#">Pizza Sandwiches</a>
                    <a href="#">Desserts</a>
                    <a href="#">Beverages</a>
                </div>
            </div>
            <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
            <a href="#contact" class="w3-bar-item w3-button">CONTACT</a>
        </div>

        <div
            style="height:800px;background-image:url('https://www.w3schools.com/w3css/img_pizza.jpg');background-size:cover"
            class=" w3-grayscale-min w3-xxlarge ">
            <div class="w3-display-bottomleft">
                <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
            </div>
            <div class="w3-display-middle w3-center">
                <span class="w3-text-white" style="font-size:100px">thin<br>CRUST PIZZA</span>

            </div>
        </div>

        <!-- End Content -->
    </div>
    <!-- Menu -->


    <div class="w3-row w3-black" style="font-size: large">
        <div class="justify-text">
            <h2>Our Menu</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
                blind
                texts.</p>
        </div>


    </div>

    <div class="w3-black img img-container">
        @foreach($foods as $food)
            <div style="display: flex; width: 33%; margin-bottom: 40px; font-size: large">
                <img src="{{asset('images/'. $food->p_image)}}" alt="Name1" style="width:50%">
                <div class="text-p4" style="">
                    <h3>{{$food -> p_name}}</h3>
                    <p>
                        {{$food -> p_description}}
                    </p>
                    <p>
                        {{$food -> p_price}}vnđ
                        <a class="btn w3-btn" href="{{route('clientView.show',['p_id'=> $food->p_id])}}">Details</a>
                    </p>
                </div>
            </div>
        @endforeach
        {{--            padding: 10px 10px 10px 0px;--}}
    </div>


    <div>

        <!-- About -->
        <div id="about" class="w3-container w3-black w3-grayscale w3-xlarge w3-padding-64">

            <h1 class="w3-center w3-jumbo">About</h1>

            <p>The Pizza Restaurant was founded in blabla by Mr. Italiano in lorem ipsum dolor sit amet, consectetur
                adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <p><strong>The Chef?</strong> Mr. Italiano himself


            <p>We are proud of our interiors.</p>
            <p class="w3-padding-16 w3-stretch">
                <img src="https://www.w3schools.com/w3css/img_restaurant.jpg" style="width:100%" alt="Restaurant">
            </p>
            <h1><b>Opening Hours</b></h1>

            <div class="w3-row">
                <div class="w3-half">
                    <p>Mon &amp; Tue CLOSED</p>
                    <p>Wednesday 10.00 - 24.00</p>
                    <p>Thursday 10:00 - 24:00</p>
                </div>
                <div class="w3-half">
                    <p>Friday 10:00 - 12:00</p>
                    <p>Saturday 10:00 - 23:00</p>
                    <p>Sunday Closed</p>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact -->
    <img  src="https://www.w3schools.com/w3css/map.jpg" class="w3-image w3-greyscale" alt="Map"
         style="width:100%">

    <div class="w3-container w3-black w3-grayscale-min w3-xlarge w3-padding-top-32">

        <h1 id="contact" class="w3-center w3-jumbo">Contact</h1>

        <p>Find us at some [address] or call us at 05050515-122330</p>
        <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater
            the
            food
            to satisfy the biggerst criteria of them all, both look and taste.</p>

        <p class="w3-xxlarge"><b>Reserve</b> a table, ask for today's special or just send us a message:</p>

        <form action="#" target="">

            <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name">
            </p>

            <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required
                      name="People"></p>

            <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time"
                      required
                      name="date" value="2020-11-16T20:00"></p>

            <p><input class="w3-input w3-padding-16 w3-border" type="text"
                      placeholder="Message \ Special requirements"
                      required name="Message"></p>

            <p>
                <button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button>
            </p>

        </form>


    </div>
@endsection
