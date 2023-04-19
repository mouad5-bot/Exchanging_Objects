@extends('layouts.app')

@section('title', 'about')

@section('content')
  <div>
    <h3 class="text-center"> Welcome to NtbadLo!</h3>
    <hr>
    <div class="d-flex" id="about-content">
      <div class="me-2" id="about-image">
        <img src="{{ asset('assets/images/about.png') }}"  alt="thsi is about image">
      </div>
      <div>        

        <p> NtbadLo is a platform that allows people to exchange things in a way that is better for the environment. Our website makes it easy for users to share or trade items they already have, instead of buying new ones. We believe that this can contribute to a more sustainable use of resources and a better future for our planet.</p>
        
        <p> Our website is user-friendly and easy to navigate. Users can upload items they want to exchange and search for items they need. It's not just about getting things, but also about building relationships with others. We encourage users to communicate with each other and make arrangements to exchange their items. This helps to create a strong sense of community and builds relationships among our users.</p>
        
        <p> We believe that by using NtbadLo, people can collaborate and exchange items with each other, which not only makes their lives easier but also helps to reduce waste and protect the environment. We also hope that our platform can help to strengthen communities and build relationships among our users.</p>
        
        <p> Thank you for choosing NtbadLo. We hope you enjoy using our platform and helping to create a more sustainable future for all of us.</p>        
      
      </div>
    </div>
  </div>
@endsection