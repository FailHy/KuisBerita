<x-guest-layout>
    <div style="max-width: 500px; margin: 0 auto; padding: 2rem; border: 3px solid black; box-shadow: 6px 6px 0px 0px black; background: white;">
        <h2 style="text-transform: uppercase; font-weight: 800; letter-spacing: -0.05em; margin-bottom: 2rem; text-align: center;">REGISTER</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div style="margin-bottom: 1.5rem;">
                <label for="name" style="display: block; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">NAME</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                       style="width: 100%; padding: 0.75rem; border: 2px solid black; font-weight: 600;">
                @error('name')
                    <div style="color: #ff4757; font-weight: 600; margin-top: 0.5rem; padding: 0.5rem; background: #ffecec; border: 2px solid black;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email Address -->
            <div style="margin-bottom: 1.5rem;">
                <label for="email" style="display: block; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">EMAIL</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                       style="width: 100%; padding: 0.75rem; border: 2px solid black; font-weight: 600;">
                @error('email')
                    <div style="color: #ff4757; font-weight: 600; margin-top: 0.5rem; padding: 0.5rem; background: #ffecec; border: 2px solid black;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">PASSWORD</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       style="width: 100%; padding: 0.75rem; border: 2px solid black; font-weight: 600;">
                @error('password')
                    <div style="color: #ff4757; font-weight: 600; margin-top: 0.5rem; padding: 0.5rem; background: #ffecec; border: 2px solid black;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div style="margin-bottom: 2rem;">
                <label for="password_confirmation" style="display: block; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">CONFIRM PASSWORD</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                       style="width: 100%; padding: 0.75rem; border: 2px solid black; font-weight: 600;">
                @error('password_confirmation')
                    <div style="color: #ff4757; font-weight: 600; margin-top: 0.5rem; padding: 0.5rem; background: #ffecec; border: 2px solid black;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('login') }}" style="font-weight: 600; text-decoration: underline; color: black;">
                    ALREADY REGISTERED?
                </a>

                <button type="submit" style="
                    background-color: #000000;
                    color: white;
                    padding: 0.75rem 1.5rem;
                    border: 2px solid black;
                    font-weight: 800;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    box-shadow: 3px 3px 0px 0px black;
                    cursor: pointer;
                    transition: all 0.2s;
                ">
                    REGISTER
                </button>
            </div>
        </form>
    </div>

    <style>
        button:hover {
            transform: translate(2px, 2px);
            box-shadow: 1px 1px 0px 0px black !important;
        }
        
        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px #fffa65;
        }
        
        @media (max-width: 600px) {
            div[style*="max-width: 500px"] {
                padding: 1.5rem;
                margin: 0 1rem;
            }
            
            div[style*="display: flex; justify-content: space-between"] {
                flex-direction: column;
                gap: 1rem;
            }
            
            a[style*="font-weight: 600"] {
                margin-bottom: 1rem;
            }
        }
    </style>
</x-guest-layout>