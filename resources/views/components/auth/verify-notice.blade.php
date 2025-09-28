<x-layout>
    <x-slot:title>Email Verification</x-slot:title>

    <div class="bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Verify Your Email Address</h2>
        <p class="text-gray-600 mb-6">
            Thanks for signing up! Before getting started, could you verify your email address
            by clicking on the link we just emailed to you?
            If you didn’t receive the email, we will gladly send you another.
        </p>

        @if (session('status') == 'verification-link-sent')
            <p class="mb-4 text-sm text-green-600">
                A new verification link has been sent to your email address.
            </p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                Resend Verification Email
            </button>
        </form>
    </div>
</x-layout>
