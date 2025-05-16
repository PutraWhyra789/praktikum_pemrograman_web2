<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK601 - Website CodeIgniter 4</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    
    <style>
        .animate-element {
            opacity: 0;
            transform: translateY(20px);
        }

        .card-container {
            perspective: 1000px;
        }

        .profile-card {
            position: relative;
            width: 100%;
            height: 100%;
            cursor: pointer;
            transform-style: preserve-3d;
            transition: transform 0.8s;
            box-shadow: 0 10px 30px -15px rgba(0, 0, 0, 0.3);
            background-color: #f3f4f6;
            border-radius: 0.5rem;
        }

        .profile-card:hover {
            box-shadow: 0 15px 35px -15px rgba(0, 0, 0, 0.5);
        }       

        .profile-card.is-flipped {
            transform: rotateY(180deg);
        }

        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .card-front {
            background-color: #f3f4f6;
        }

        .card-back {
            background-color: #f3f4f6;
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .skill-bar-fill {
            transition: width 1.5s ease-out;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold animate-element"><?= $student['nama'] ?> - <?= $student['nim'] ?></h1>
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="<?= base_url('beranda') ?>" class="hover:text-blue-200 transition duration-300 text-lg font-medium">Beranda</a></li>
                        <li><a href="<?= base_url('profil') ?>" class="hover:text-blue-200 transition duration-300 text-lg font-medium">Profil</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="container mx-auto px-4 py-8">