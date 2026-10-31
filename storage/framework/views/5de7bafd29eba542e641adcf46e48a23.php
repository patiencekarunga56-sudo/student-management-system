<!-- ========================================== -->
    <!-- PROFESSIONAL FOOTER                        -->
    <!-- ========================================== -->
    <footer class="bg-[#0B2545] text-gray-300 pt-16 pb-8 border-t-4 border-[#9A4D10]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                
                <!-- Column 1: Brand & About -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center overflow-hidden p-1">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="MUBS Logo" class="w-full h-full object-contain">
                        </div>
                        <span class="text-2xl font-bold text-white tracking-tight">MUBS</span>
                    </div>
                    <p class="text-sm leading-relaxed text-gray-400">
                        The ultimate platform for managing student records, courses, and academic communication seamlessly. Designed for modern educational institutions.
                    </p>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4 pt-2">
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#9A4D10] hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#9A4D10] hover:text-white transition duration-300">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#9A4D10] hover:text-white transition duration-300">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#9A4D10] hover:text-white transition duration-300">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6 tracking-wide">Quick Links</h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="<?php echo e(url('/')); ?>" class="text-sm text-gray-400 hover:text-[#9A4D10] transition duration-300 flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-[#9A4D10]"></i> Home
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/login')); ?>" class="text-sm text-gray-400 hover:text-[#9A4D10] transition duration-300 flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-[#9A4D10]"></i> Student Portal
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/login')); ?>" class="text-sm text-gray-400 hover:text-[#9A4D10] transition duration-300 flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-[#9A4D10]"></i> Admin Portal
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/contact')); ?>" class="text-sm text-gray-400 hover:text-[#9A4D10] transition duration-300 flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-[#9A4D10]"></i> Contact Support
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Contact Info -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6 tracking-wide">Contact Us</h4>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-[#9A4D10] mt-1"></i>
                            <span>123 University Avenue,<br>Kampala, Uganda</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-[#9A4D10]"></i>
                            <a href="mailto:support@mubs.ac.ug" class="hover:text-white transition">support@mubs.ac.ug</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone-alt text-[#9A4D10]"></i>
                            <a href="tel:+256700000000" class="hover:text-white transition">+256 700 000 000</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Newsletter -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-6 tracking-wide">Newsletter</h4>
                    <p class="text-sm text-gray-400 mb-4">Subscribe to get the latest updates and news delivered to your inbox.</p>
                    <form class="relative" onsubmit="event.preventDefault();">
                        <input type="email" placeholder="Your email address" class="w-full bg-white/5 border border-white/10 text-white placeholder-gray-500 rounded-lg py-3 px-4 focus:outline-none focus:border-[#9A4D10] focus:ring-1 focus:ring-[#9A4D10] transition text-sm">
                        <button type="submit" class="absolute right-1 top-1 bottom-1 bg-[#9A4D10] hover:bg-[#7a3c0c] text-white px-4 rounded-md transition text-sm font-medium">
                            Subscribe
                        </button>
                    </form>
                </div>

            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500">
                    &copy; <?php echo e(date('Y')); ?> MUBS Student Management System. All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/includes/footer.blade.php ENDPATH**/ ?>