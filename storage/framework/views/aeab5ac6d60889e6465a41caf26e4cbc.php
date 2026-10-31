<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUBS - Student Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS via CDN (No Vite needed) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-white text-gray-900">

    <!-- ========================================== -->
    <!-- NAVIGATION BAR                             -->
    <!-- ========================================== -->
 

  <?php echo $__env->make('includes.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- ========================================== -->
    <!-- HERO SECTION (With Professional Images)    -->
    <!-- ========================================== -->
    <section class="bg-white pt-24 pb-20 overflow-hidden relative">
        <!-- Background decorative blob -->
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-[500px] h-[500px] bg-[#9A4D10]/5 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                
                <!-- Left Text Content -->
                <div class="mb-12 lg:mb-0">
                    <span class="inline-block px-4 py-1.5 text-sm font-bold text-[#9A4D10] bg-[#9A4D10]/10 rounded-full mb-6">
                        Welcome to MUBS Portal
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold text-[#0B2545] leading-[1.1] mb-6">
                        Streamline Your <br> 
                        <span class="text-[#9A4D10]">Student Management</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed">
                        A comprehensive platform designed for students and administrators to manage academic records, courses, and communication seamlessly.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/login" class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-white bg-[#9A4D10] hover:bg-[#7a3c0c] rounded-xl shadow-lg shadow-[#9A4D10]/30 transition duration-300 transform hover:-translate-y-0.5">
                            Login to Portal
                        </a>
                        <a href="/login" class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold text-[#0B2545] bg-white border-2 border-gray-200 hover:border-[#0B2545] rounded-xl transition duration-300">
                            Create an Account
                        </a>
                    </div>
                </div>

                <!-- Right Image Layout (Overlapping Professional Style) -->
                <div class="relative h-[500px] w-full hidden lg:block">
                    <!-- Decorative background shapes -->
                    <div class="absolute inset-0 bg-[#9A4D10]/10 rounded-[2rem] transform rotate-3 scale-105"></div>
                    <div class="absolute inset-0 bg-[#0B2545]/5 rounded-[2rem] transform -rotate-2 scale-105"></div>
                    
                    <!-- Main Large Image (Students on campus) -->
                <img src="<?php echo e(asset('images/bb.jpg')); ?>" 
                         alt="Students collaborating" 
                         class="absolute top-0 right-0 w-[85%] h-[80%] object-cover rounded-3xl shadow-2xl border-4 border-white z-10">
                    
                    <!-- Secondary Floating Image (Student studying) -->
             <img src="<?php echo e(asset('images/cc.jpg')); ?>" 
                         alt="Student studying" 
                         class="absolute bottom-0 left-0 w-[60%] h-[55%] object-cover rounded-2xl shadow-xl border-4 border-white z-20">
                    
                    <!-- Floating Stat Badge -->
                    <div class="absolute bottom-10 right-4 bg-white p-4 rounded-xl shadow-lg z-30 flex items-center gap-4">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Graduated</p>
                            <p class="text-xl font-bold text-[#0B2545]">5,000+</p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Image Fallback (Shows on smaller screens) -->
                <div class="relative block lg:hidden mt-10">
                 <img src="<?php echo e(asset('images/cc.jpg')); ?>" 
                         alt="Students collaborating" 
                         class="rounded-3xl shadow-xl w-full object-cover h-[300px]">
                </div>
                
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- FEATURES SECTION                           -->
    <!-- ========================================== -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#0B2545] mb-4">Everything you need in one place</h2>
                <p class="text-lg text-gray-600">Whether you are a student looking to check your grades or an admin managing records, we have you covered.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 (With Image) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 group overflow-hidden flex flex-col">
                    <div class="h-48 overflow-hidden">
             <img src="<?php echo e(asset('images/aa.jpg')); ?>" 
                             alt="Students learning" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-8 flex-1">
                        <div class="w-12 h-12 bg-[#0B2545] text-white flex items-center justify-center rounded-xl mb-5 text-xl -mt-12 relative z-10 border-4 border-white shadow-sm">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#0B2545] mb-3">Student Portal</h3>
                        <p class="text-gray-600 leading-relaxed">Students can easily register for courses, view their academic transcripts, and update personal information.</p>
                    </div>
                </div>

                <!-- Feature 2 (With Image) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 group overflow-hidden flex flex-col">
                    <div class="h-48 overflow-hidden">
                        <img src="<?php echo e(asset('images/track.jpg')); ?>" 
                             alt="Admin Dashboard" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-8 flex-1">
                        <div class="w-12 h-12 bg-[#9A4D10] text-white flex items-center justify-center rounded-xl mb-5 text-xl -mt-12 relative z-10 border-4 border-white shadow-sm">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#0B2545] mb-3">Admin Dashboard</h3>
                        <p class="text-gray-600 leading-relaxed">Administrators have full control to manage student enrollments, generate reports, and update system settings.</p>
                    </div>
                </div>

                <!-- Feature 3 (With Image) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition duration-300 group overflow-hidden flex flex-col">
                    <div class="h-48 overflow-hidden">
            <img src="<?php echo e(asset('images/cos.jpg')); ?>" 
                             alt="Library and Courses" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-8 flex-1">
                        <div class="w-12 h-12 bg-[#0B2545] text-white flex items-center justify-center rounded-xl mb-5 text-xl -mt-12 relative z-10 border-4 border-white shadow-sm">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#0B2545] mb-3">Course Management</h3>
                        <p class="text-gray-600 leading-relaxed">Keep track of available courses, schedules, and faculty assignments all within a centralized database.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- FOOTER                                     -->
    <!-- ========================================== -->
  
        <?php echo $__env->make('includes.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



</body>
</html><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/index.blade.php ENDPATH**/ ?>