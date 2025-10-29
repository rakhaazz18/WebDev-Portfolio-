@extends('layouts.app')

@section('title','Contact — Rakha')

@section('content')
<section class="contact-section fade-in">
  <div class="contact-container">
    <!-- Left: Contact Info -->
    <div class="contact-info">
      <h2 class="section-title">Get in Touch</h2>
      <p class="contact-desc">
        Whether you have questions about my projects, collaborations, or opportunities, feel free to reach out — I'd love to connect.
      </p>

      <div class="contact-item">
        <i class="fas fa-envelope"></i>
        <div>
          <h4>Email</h4>
          <p>amuhammad08@student.ciputra.ac.id</p>
        </div>
      </div>

      <div class="contact-item">
        <i class="fas fa-phone"></i>
        <div>
          <h4>Phone</h4>
          <p>+62 821-9494-9464</p>
        </div>
      </div>

      <div class="contact-item">
        <i class="fas fa-map-marker-alt"></i>
        <div>
          <h4>Location</h4>
          <p>Makassar, Indonesia</p>
        </div>
      </div>
    </div>

    <!-- Right: Contact Form -->
    <div class="contact-form">
      <form id="contact-form" method="POST" action="/contact-send">
        @csrf
        <div class="form-group">
          <label>Your Name</label>
          <input type="text" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phone" placeholder="Enter your phone number">
        </div>
        <div class="form-group">
          <label>Message</label>
          <textarea name="message" placeholder="Write your message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn-gold">Send Message</button>
        <div class="form-message" style="margin-top:1rem;display:none"></div>
      </form>
    </div>
  </div>
</section>
@endsection
