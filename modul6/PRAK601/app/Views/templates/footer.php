</main>
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>PRAK601 - Pemrograman Web II</p>
            <p class="mt-2 text-gray-400">Dibuat dengan CodeIgniter 4, Anime.js, dan Tailwind CSS</p>
        </div>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            anime({
                targets: '.animate-element',
                opacity: 1,
                translateY: 0,
                duration: 1000,
                easing: 'easeOutExpo',
                delay: 300
            });
            
            anime({
                targets: '.content-animate',
                opacity: [0, 1],
                translateY: [20, 0],
                delay: anime.stagger(100, {start: 600}),
                easing: 'easeOutExpo'
            });
        });
    </script>
</body>
</html>