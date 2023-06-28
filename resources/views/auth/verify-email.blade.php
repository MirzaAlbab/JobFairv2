<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Terima kasih telah mendaftar! Sebelum memulai, verifikasi alamat email Anda dengan mengeklik tautan yang baru saja dikirimkan melalui email. Jika tidak menerima email verifikasi, silahkan klik tombol kirim ulang untuk mengirim ulang email verifikasi.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang anda gunakan saat pendaftaran.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}" id="resend-form">
            @csrf
            <div>
                <x-primary-button id="resend">
                    {{ __('Kirim ulang') }}
                </x-primary-button>
            </div>
           
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-white hover:text-white px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
        
    </div>
    
    
    <script>
        // add event listener to resend button on click
        document.getElementById("resend").addEventListener("click", function() {
            // disable button
            document.getElementById("resend").disabled = true;
            // change button text
            document.getElementById("resend").innerHTML = "Mengirim...";
            // submit form
            document.getElementById("resend-form").submit();
            // prevent form from submitting twice
            event.preventDefault();
        });

        
       
    </script>
</x-guest-layout>
