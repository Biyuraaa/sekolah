@extends('layouts.guest')
@section('title', 'Contact Us')
@section('content')
    <!-- Hero Section -->
    <section class="relative py-24 bg-gradient-to-br from-blue-100 via-white to-blue-100 overflow-hidden">
        <!-- Background Shapes -->
        <div class="absolute inset-0">
            <svg class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2 text-blue-200" width="800"
                height="800" fill="none" viewBox="0 0 800 800">
                <circle cx="400" cy="400" r="400" stroke-width="2" stroke="currentColor" />
                <circle cx="400" cy="400" r="300" stroke-width="2" stroke="currentColor" />
                <circle cx="400" cy="400" r="200" stroke-width="2" stroke="currentColor" />
            </svg>
            <svg class="absolute bottom-0 right-0 transform translate-x-1/2 translate-y-1/2 text-blue-200" width="600"
                height="600" fill="none" viewBox="0 0 600 600">
                <circle cx="300" cy="300" r="300" stroke-width="2" stroke="currentColor" />
                <circle cx="300" cy="300" r="200" stroke-width="2" stroke="currentColor" />
                <circle cx="300" cy="300" r="100" stroke-width="2" stroke="currentColor" />
            </svg>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">Connect with Our <span
                        class="text-blue-600">Learning Community</span></h1>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Embark on an educational journey with us. Reach out to learn more about our programs and enrollment
                    opportunities.
                </p>
                <a href="#contact-form"
                    class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                    Get in Touch
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Address -->
                <div class="text-center p-6 bg-blue-50 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="mb-4 flex justify-center">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Our Campus</h4>
                    <p class="text-gray-600">123 Education Street, Knowledge City, 45678</p>
                </div>
                <!-- Email -->
                <div class="text-center p-6 bg-blue-50 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="mb-4 flex justify-center">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a1 1 0 001.22 0L21 8M3 8a2 2 0 012-2h14a2 2 0 012 2m-18 0v8a2 2 0 002 2h14a2 2 0 002-2V8" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Email Us</h4>
                    <p class="text-gray-600">contact@school.edu</p>
                </div>
                <!-- Phone -->
                <div class="text-center p-6 bg-blue-50 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="mb-4 flex justify-center">
                        <div class="bg-blue-100 p-4 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.684l1.62 4.86a1 1 0 01-.95 1.316h-.105l-2.49-.124a20.16 20.16 0 005.414 5.413l-.124-2.49a1 1 0 011.316-.95l4.86 1.62a1 1 0 01.684.95V19a2 2 0 01-2 2h-1C9.715 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Call Us</h4>
                    <p class="text-gray-600">+1 (234) 567-890</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact-form" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-2xl">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Get in Touch</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                Address</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-600 text-white px-8 py-3 rounded-full text-lg font-semibold shadow-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Visit Our Campus</h2>
                <p class="text-gray-600 mt-2">Our school is located in the heart of Knowledge City.</p>
            </div>
            <div class="w-full h-96 rounded-2xl overflow-hidden shadow-2xl">
                <iframe class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126730.86568339263!2d112.65081480611338!3d-7.2459718531965905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf163e61be3%3A0x8683e5c3c1fadb9f!2sSurabaya%2C%20Surabaya%20City%2C%20East%20Java%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1616400000000!5m2!1sen!2sus"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Form submission animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = form.querySelector('button[type="submit"]');
            button.innerHTML = '<span class="animate-spin inline-block mr-2">↻</span> Sending...';
            // Simulate form submission (replace with actual form submission logic)
            setTimeout(() => {
                button.innerHTML = 'Message Sent!';
                button.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                button.classList.add('bg-green-600', 'hover:bg-green-700');
            }, 2000);
        });
    </script>
@endpush
