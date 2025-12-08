<div class="bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="flex justify-center items-center min-h-screen px-4 py-10">
        <div class="w-full m-10 bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden border border-white/60 grid grid-cols-1 lg:grid-cols-3">
            
            <!-- Sidebar Branding -->
            <div class="glass-sidebar text-white p-8 lg:p-10 flex flex-col justify-between relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-10 left-10 w-32 h-32 rounded-full bg-blue-300 animate-float"></div>
                    <div class="absolute bottom-10 right-10 w-40 h-40 rounded-full bg-cyan-300 animate-float" style="animation-delay: 2s;"></div>
                    <div class="absolute top-1/2 left-1/3 w-24 h-24 rounded-full bg-indigo-300 animate-float" style="animation-delay: 4s;"></div>
                </div>
                
                <div class="relative z-10">
                    <!-- Logo & Welcome -->
                    <div class="mb-10">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                                <img src="{{ asset('img/logo.png') }}" class="w-10 h-10" alt="SMK 4 KUNINGAN">
                            </div>
                            <div>
                                <p class="text-xl text-blue-100 font-merriweather">Selamat datang, {{ $name }}</p>
                                <p class="text-md text-blue-200 font-poppins">Silakan melakukan registrasi akun Anda.</p>
                            </div>
                        </div>
                        
                        <h1 class="text-2xl lg:text-3xl font-bold mb-4">
                            SMKN <span class="text-gradient">4 Kuningan</span>
                        </h1>
                        <p class="text-blue-100 text-smd font-merriweather leading-relaxed">
                            Bersama membangun generasi unggul melalui layanan digital resmi
                        </p>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="relative z-10 pt-6 border-t border-white/20">
                    <div class="text-center">
                        <p class="text-xs text-blue-200">
                            © 2025 SMKN 4 Kuningan. Seluruh hak cipta dilindungi.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Form Area -->
            <div class="form-container p-6 sm:p-8 lg:p-10 lg:col-span-2">
                <form wire:submit.prevent="submit" @if($isTeacher) enctype="multipart/form-data" @endif class="space-y-8">
                    @csrf
                    <!-- Header -->
                    <div>
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Registrasi Akun</h2>
                        <p class="text-gray-600 text-sm">Isi data Anda dengan benar untuk melanjutkan</p>
                    </div>
                    
                    <!-- Basic Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nama Lengkap -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" wire:model.live.debounce.200ms="name" placeholder="Masukkan nama lengkap"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                            </div>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Username
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-at text-gray-400"></i>
                                </div>
                                <input type="text" wire:model="username" readonly placeholder="Username akan terisi otomatis"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 bg-gray-50 rounded-xl cursor-not-allowed">
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" wire:model="email" placeholder="contoh@email.com"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                            </div>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Password -->
                        <div x-data="{ show: false }">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input :type="show ? 'text' : 'password'" wire:model="password"
                                       placeholder="Minimal 8 karakter"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                <button type="button" @click="show = !show"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-600 transition-colors">
                                    <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <!-- Konfirmasi Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Konfirmasi Password <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input type="password" wire:model.live="password_confirmation" 
                                       placeholder="Ulangi password"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                       @error('password_confirmation')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Teacher Fields (Conditional) -->
                    <div x-data="{ teacherActive: @if($isTeacher) true @else false @endif }" x-show="teacherActive">
                        <!-- Section Header -->
                        <div class="flex items-center justify-between mb-6 pt-6 border-t border-gray-200">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Data Guru</h3>
                                <p class="text-sm text-gray-600">Informasi tambahan untuk akun guru</p>
                            </div>
                            <span class="status-badge">
                                <i class="fas fa-chalkboard-teacher mr-2"></i>
                                Mode Guru
                            </span>
                        </div>
                        
                        <!-- Teacher Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- NIP -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-id-card text-gray-400"></i>
                                    </div>
                                    <input type="text" wire:model="nip" placeholder="Nomor Induk Pegawai"
                                           class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                </div>
                                @error('nip')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Nomor HP -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-phone text-gray-400"></i>
                                    </div>
                                    <input type="text" wire:model="phone" placeholder="0812xxxxxx"
                                           class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                </div>
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Jenis Kelamin -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                                <div class="relative">
                                    <select wire:model="gender"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                        <option value="">-- Pilih Gender --</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                @error('gender')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Tanggal Lahir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-calendar text-gray-400"></i>
                                    </div>
                                    <input type="date" wire:model="date_of_birth"
                                           class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                </div>
                                @error('date_of_birth')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <div class="relative">
                                    <select wire:model="status"
                                            class="w-full pl-10 pr-4 py-3 border border-gray-400 active:border-blue-500 rounded-xl">
                                        <option value="">-- Pilih Status --</option>
                                        @foreach(\App\Enums\TeacherStatus::cases() as $status)
                                            <option value="{{ $status->value }}">{{ $status->getLabel() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('status')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Placeholder untuk alignment -->
                            <div></div>
                            
                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3">
                                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                                    </div>
                                    <textarea wire:model="address" rows="3" placeholder="Tuliskan alamat lengkap"
                                              class="border border-gray-400 active:border-blue-500 w-full pl-10 pr-4 py-3 rounded-xl resize-none"></textarea>
                                </div>
                                @error('address')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <!-- Photo Upload -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Foto Profil</label>
                                <div x-data="{ isUploading: false }" class="space-y-4">
                                    <!-- File Input -->
                                    <div class="file-upload rounded-xl p-4 text-center cursor-pointer hover:border-blue-400 transition-colors"
                                         @click="$refs.fileInput.click()">
                                        <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                        <p class="text-sm text-gray-600 mb-1">
                                            <span class="font-medium text-blue-600">Klik untuk upload</span> atau drag & drop
                                        </p>
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 5MB)</p>
                                        <input type="file" wire:model="photo" accept="image/*" class="hidden" 
                                               x-ref="fileInput" @change="isUploading = true">
                                    </div>
                                    
                                    @error('photo')
                                        <div class="p-3 bg-red-50 border border-red-200 rounded-lg">
                                            <span class="text-red-600 text-sm flex items-center">
                                                <i class="fas fa-exclamation-circle mr-2"></i>
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                    
                                    <!-- Photo Preview -->
                                    @if ($photo)
                                        <div class="mt-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                                            <p class="text-sm font-medium text-gray-700 mb-3">Pratinjau Foto:</p>
                                            <div class="flex items-start space-x-4">
                                                <div class="relative">
                                                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview" 
                                                         class="w-24 h-24 object-cover rounded-lg border-2 border-gray-300">
                                                    <button type="button" wire:click="$set('photo', null)"
                                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-sm text-gray-600">
                                                        Foto siap diunggah. Klik tombol <span class="font-medium">×</span> untuk membatalkan.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <button
                                class="btn-primary w-full text-white font-semibold px-8 py-4 rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-plus mr-3"></i>
                            Daftar Sekarang
                        </button>
                        
                        <!-- Helper Text -->
                        <p class="text-center text-gray-500 text-sm mt-4">
                            Dengan mendaftar, Anda menyetujui 
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Syarat & Ketentuan</a>
                            kami.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
      <style>
        
        h1, h2, h3, .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        
        .glass-sidebar {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9) 0%, rgba(49, 46, 129, 0.9) 100%);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .form-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }
        
        .input-field {
            background: #ffffff;
            border: 1.5px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        
        .input-field:hover {
            border-color: #93c5fd;
            box-shadow: 0 2px 8px rgba(147, 197, 253, 0.2);
        }
        
        .input-field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3), 0 2px 4px -1px rgba(59, 130, 246, 0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4), 0 4px 6px -2px rgba(59, 130, 246, 0.2);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .file-upload {
            border: 2px dashed #cbd5e1;
            background: #f8fafc;
            transition: all 0.3s ease;
        }
        
        .file-upload:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            background: #e0f2fe;
            color: #0369a1;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</div>