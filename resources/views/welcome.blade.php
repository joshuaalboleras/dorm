<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dormitory Landing Page</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-900">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600">DormLife</div>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Log in</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative h-screen flex items-center justify-center text-center px-4">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/70 to-purple-600/70"></div>
        </div>
        
        <div class="relative z-10 text-white max-w-2xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">Your Home Away from Home</h1>
            <p class="text-lg md:text-xl mb-8 opacity-90">Experience comfort, community, and convenience in a modern living space designed for students.</p>
            <a href="{{ route('register') }}" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                Join Our Community
            </a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose DormLife?</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition">
                    <div class="text-4xl mb-4 text-blue-600">🏡</div>
                    <h3 class="text-xl font-semibold mb-3">Modern Spaces</h3>
                    <p class="text-gray-600">Fully-equipped rooms with contemporary design and comfort.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition">
                    <div class="text-4xl mb-4 text-blue-600">🌍</div>
                    <h3 class="text-xl font-semibold mb-3">Prime Location</h3>
                    <p class="text-gray-600">Conveniently located near campus and city amenities.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg text-center hover:shadow-xl transition">
                    <div class="text-4xl mb-4 text-blue-600">🔒</div>
                    <h3 class="text-xl font-semibold mb-3">Secure Living</h3>
                    <p class="text-gray-600">24/7 security and modern safety features.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-blue-600 text-white py-16 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Start Your Journey?</h2>
            <p class="text-lg mb-8 opacity-90">Join hundreds of students who have found their perfect home.</p>
            <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                Get Started
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8 px-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 DormLife. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>