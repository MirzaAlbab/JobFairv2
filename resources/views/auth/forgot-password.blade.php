<x-guest-layout>
   

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Masukkan alamat email Anda dan tautan setel ulang kata sandi akan dikirimkan melalui email yang Anda masukkan.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" id="forgotpwd-form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button id="forgotpwd">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

    <script>
    // add event listener to resend button on click
    document.getElementById("forgotpwd").addEventListener("click", function() {
       // disable button
       document.getElementById("forgotpwd").disabled = true;
            // change button text
            document.getElementById("forgotpwd").innerHTML = "Mengirim...";
            // submit form
            document.getElementById("forgotpwd-form").submit();
            // prevent form from submitting twice
            event.preventDefault();
    });
    </script>
