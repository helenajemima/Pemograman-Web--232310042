{{-- Wrapper utama footer dengan padding bawah dan background custom --}}
<div class="pb-5" style="background-color: var(--bg-main);">
    <div class="container">

        {{-- Elemen footer dengan warna teks custom --}}
        <footer style="color: var(--text-light);">

            {{-- Flexbox: layout responsif horizontal untuk layar besar, vertikal untuk kecil --}}
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center">
                
                {{-- Teks hak cipta --}}
                <p class="mb-3 mb-sm-0 small">&copy; 2025 Learnify. All rights reserved.</p>
                
                {{-- Daftar ikon media sosial dalam satu baris dengan jarak antar elemen --}}
                <ul class="list-unstyled d-flex gap-3 mb-0">

                    {{-- Item Instagram --}}
                    <li>
                        <a href="#" class="text-light text-decoration-none" aria-label="Instagram">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                    </li>

                    {{-- Item Facebook --}}
                    <li>
                        <a href="#" class="text-light text-decoration-none" aria-label="Facebook">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                    </li>

                    {{-- Item Twitter (X) --}}
                    <li>
                        <a href="#" class="text-light text-decoration-none" aria-label="Twitter">
                            <i class="bi bi-twitter-x fs-5"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </footer>
    </div>
</div>
