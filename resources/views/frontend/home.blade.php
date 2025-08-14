<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakhor Das Opi | Intro</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=cancel,menu,school,work" />
    @vite(['resources/css/main.css', 'resources/js/app.js'])
</head>

<body>
    <header class="sticky top-0 z-50 bg-blue-400 text-white shadow">
        <nav class="flex flex-wrap items-center justify-between max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <a href="#" class="home-logo text-2xl sm:text-3xl font-mono tracking-widest mb-2 sm:mb-0">SDO</a>
            <button id="nav-toggle" class="sm:hidden text-3xl focus:outline-none" aria-label="Toggle navigation">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <ul id="nav-menu"
                class="hidden sm:flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-8 text-base sm:text-lg font-semibold w-full sm:w-auto mt-4 sm:mt-0 bg-blue-400 sm:bg-transparent rounded-lg sm:rounded-none shadow sm:shadow-none p-4 sm:p-0 absolute sm:static left-0 top-16 sm:top-auto z-40">
                <li><a href="#home" class="block px-2 py-1 hover:text-blue-800 transition-colors">Home</a></li>
                <li><a href="#about" class="block px-2 py-1 hover:text-blue-800 transition-colors">About</a></li>
                <li><a href="#experience" class="block px-2 py-1 hover:text-blue-800 transition-colors">Experience</a>
                </li>
                <li><a href="#academics" class="block px-2 py-1 hover:text-blue-800 transition-colors">Academics</a>
                </li>
                <li><a href="#skills" class="block px-2 py-1 hover:text-blue-800 transition-colors">Skills</a></li>
                <li><a href="#projects" class="block px-2 py-1 hover:text-blue-800 transition-colors">Projects</a></li>
                <li><a href="#contact" class="block px-2 py-1 hover:text-blue-800 transition-colors">Contact</a></li>
            </ul>
        </nav>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const navToggle = document.getElementById('nav-toggle');
                const navMenu = document.getElementById('nav-menu');
                navToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('hidden');
                });
            });
        </script>
    </header>
    <!-- Page sections for navigation targets (empty for now) -->
    <div id="home"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">Sakhor Das Opi</h1>
        <p class="max-w-2xl text-base sm:text-lg text-center">Welcome to the home section. This content is responsive
            and adapts to your device size.</p>
    </div>
    <div id="about"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">About Me Section</h1>
        <p class="max-w-2xl text-base sm:text-lg text-center">Learn more about me. This section is also responsive for
            all devices.</p>
    </div>
    <div id="experience"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">Experience</h1>
        <div class="w-full max-w-2xl mx-auto flex flex-col items-center">
            <!-- Timeline vertical bar -->
            <div class="relative w-full">
                @foreach ($experiences as $experience)
                    <div class="relative flex items-center mb-8 cursor-pointer group"
                        onclick="showExperienceModal({{ $experience->id }})">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-blue-400 text-white rounded-full z-10">
                            <span class="material-symbols-outlined">
                                work
                            </span>
                        </div>
                        <div
                            class="ml-8 bg-white rounded-lg shadow p-4 flex-1 group-hover:ring-2 group-hover:ring-blue-400">
                            <h3 class="text-lg font-semibold mb-1">{{ $experience->company }}</h3>
                            <p class="text-gray-600 mb-1">{{ $experience->designation }}</p>
                            <p class="text-gray-500 text-sm">
                                {{ date('F j, Y', strtotime($experience->start_date)) }} -
                                @if (\Carbon\Carbon::parse($experience->end_date)->isToday())
                                    {{ 'Present' }}
                                @else
                                    {{ date('F j, Y', strtotime($experience->end_date)) }}
                                @endif
                            </p>
                            <p class="text-gray-600 text-sm text-right font-thin italic">Click to expand</p>
                        </div>
                    </div>
                    <!-- Modal starts -->
                    <div id="experience-modal-{{ $experience->id }}"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
                        <div
                            class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative transform transition-transform duration-300 scale-95">
                            <button onclick="closeExperienceModal({{ $experience->id }})"
                                class="absolute top-2 right-2 text-red-600 hover:text-red-700 text-3xl">
                                <span class="material-symbols-outlined">cancel</span>
                            </button>
                            <h2 class="text-2xl font-bold mb-2">{{ $experience->company }}</h2>
                            <p class="text-gray-600 mb-2">{{ $experience->designation }}</p>
                            <p class="text-gray-500 mb-2">
                                {{ date('F j, Y', strtotime($experience->start_date)) }} -
                                @if (\Carbon\Carbon::parse($experience->end_date)->isToday())
                                    Present
                                @else
                                    {{ date('F j, Y', strtotime($experience->end_date)) }}
                                @endif
                            </p>
                            <p class="mb-2"><span class="font-semibold">Description:</span>
                                {{ $experience->description }}</p>
                            <p class="mb-2"><span class="font-semibold">Link:</span> <a
                                    href="{{ $experience->link }}" target="_blank"
                                    class="text-blue-500 underline">{{ $experience->link }}</a></p>
                            <p class="mb-2"><span class="font-semibold">Responsibilities:</span>
                                {{ $experience->responsibilities }}</p>
                            @if ($experience->achievements)
                                <p class="mb-2"><span class="font-semibold">Achievements:</span>
                                    {{ $experience->achievements }}</p>
                            @endif

                        </div>
                    </div>
                    <!-- Modal ends -->
                @endforeach
                <!-- End example experiences -->
            </div>
        </div>
    </div>
    <!-- Academics Start -->
    <div id="academics"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">Academics</h1>
        <div class="w-full max-w-2xl mx-auto flex flex-col items-center">
            <!-- Timeline vertical bar -->
            <div class="relative w-full">
                @foreach ($academics as $academic)
                    <div class="relative flex items-center mb-8 cursor-pointer group"
                        onclick="showAcademicModal({{ $academic->id }})">
                        <div
                            class="w-12 h-12 flex items-center justify-center bg-blue-400 text-white rounded-full z-10">
                            <span class="material-symbols-outlined">
                                school
                            </span>
                        </div>
                        <div
                            class="ml-8 bg-white rounded-lg shadow p-4 flex-1 group-hover:ring-2 group-hover:ring-blue-400">
                            <h3 class="text-lg font-semibold mb-1">{{ $academic->institution }}</h3>
                            <p class="text-gray-600 mb-1">{{ $academic->degree }} in {{ $academic->subject }}</p>
                            <p class="text-gray-500 text-sm">
                                @if ($academic->graduation_date)
                                    {{ is_object($academic->graduation_date) ? $academic->graduation_date->format('F Y') : date('F Y', strtotime($academic->graduation_date)) }}
                                @else
                                    {{ $academic->current ? 'Ongoing' : 'N/A' }}
                                @endif
                            </p>
                            <p class="text-gray-600 text-sm text-right font-thin italic">Click to expand</p>
                        </div>
                    </div>
                    <!-- Modal for academic details -->
                    <div id="academic-modal-{{ $academic->id }}"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
                        <div
                            class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative transform transition-transform duration-300 scale-95">
                            <button onclick="closeAcademicModal({{ $academic->id }})"
                                class="absolute top-2 right-2 text-red-600 hover:text-red-700 text-3xl">
                                <span class="material-symbols-outlined">cancel</span>
                            </button>
                            <h2 class="text-2xl font-bold mb-2">{{ $academic->institution }}</h2>
                            <p class="text-gray-600 mb-2">{{ $academic->degree }}</p>
                            <p class="text-gray-800 italic mb-2">in {{ $academic->subject }}</p>
                            <p class="text-gray-500 mb-2">
                                @if ($academic->major)
                                    <span class="font-semibold">Major:</span> {{ $academic->major }}<br>
                                @endif
                                @if ($academic->syllabus)
                                    <span class="font-semibold">Syllabus:</span> <a href="{{ $academic->syllabus }}"
                                        target="_blank"
                                        class="text-blue-500 underline">{{ $academic->syllabus }}</a><br>
                                @endif
                                @if ($academic->gpa)
                                    <span class="font-semibold">GPA:</span> {{ $academic->gpa }} /
                                    {{ $academic->scale }}<br>
                                @endif

                                <span class="font-semibold">Session:</span> {{ $academic->session }}<br>
                                <span class="font-semibold">Graduation Date:</span>
                                @if ($academic->graduation_date)
                                    {{ is_object($academic->graduation_date) ? $academic->graduation_date->format('F j, Y') : date('F j, Y', strtotime($academic->graduation_date)) }}
                                @else
                                    {{ $academic->current ? 'Ongoing' : 'N/A' }}
                                @endif
                                <br>
                                <span class="font-semibold">City:</span> {{ $academic->city }}<br>
                                <span class="font-semibold">Country:</span> {{ $academic->country }}<br>
                            </p>
                            <p class="mb-2"><span class="font-semibold">Institution Link:</span> <a
                                    href="{{ $academic->link }}" target="_blank"
                                    class="text-blue-500 underline">{{ $academic->link }}</a></p>
                            @if ($academic->accolades)
                                <p class="mb-2"><span class="font-semibold">Accolades:</span>
                                    {{ $academic->accolades }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Academics end -->
    <div id="skills"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">Skills Section</h1>
        <p class="max-w-2xl text-base sm:text-lg text-center">Skills and technologies listed here. Try resizing your
            browser!</p>
    </div>
    <div id="projects"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">Projects Section</h1>
        <p class="max-w-2xl text-base sm:text-lg text-center">Project showcases and details. Fully responsive layout.
        </p>
    </div>
    <div id="contact"
        class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 sm:px-8 py-12 sm:py-16">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center">Contact Section</h1>
        <p class="max-w-2xl text-base sm:text-lg text-center">Contact information and form. Responsive for all devices.
        </p>
    </div>
    <script>
        window.showExperienceModal = function(id) {
            var modal = document.getElementById('experience-modal-' + id);
            modal.classList.remove('pointer-events-none');
            modal.classList.add('opacity-100');
            modal.classList.remove('opacity-0');
            var inner = modal.querySelector('div');
            inner.classList.remove('scale-95');
            inner.classList.add('scale-100');
        }
        window.closeExperienceModal = function(id) {
            var modal = document.getElementById('experience-modal-' + id);
            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');
            var inner = modal.querySelector('div');
            inner.classList.add('scale-95');
            inner.classList.remove('scale-100');
            setTimeout(function() {
                modal.classList.add('pointer-events-none');
            }, 300);
        }
        window.showAcademicModal = function(id) {
            var modal = document.getElementById('academic-modal-' + id);
            modal.classList.remove('pointer-events-none');
            modal.classList.add('opacity-100');
            modal.classList.remove('opacity-0');
            var inner = modal.querySelector('div');
            inner.classList.remove('scale-95');
            inner.classList.add('scale-100');
        }
        window.closeAcademicModal = function(id) {
            var modal = document.getElementById('academic-modal-' + id);
            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');
            var inner = modal.querySelector('div');
            inner.classList.add('scale-95');
            inner.classList.remove('scale-100');
            setTimeout(function() {
                modal.classList.add('pointer-events-none');
            }, 300);
        }
    </script>
</body>

</html>
