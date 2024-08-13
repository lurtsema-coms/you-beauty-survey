<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100">
      <div class="min-h-screen">
        <main class="my-12">
          <form action="">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="relative w-20 h-20 overflow-hidden">
                      <img src="{{ asset('logo.png') }}" alt="">
                    </div>
                    <h1 class="text-lg font-bold">You Salon & MedSpa Customer Survey</h1>
                    <p class="text-sm text-gray-500">We greatly appreciate your trust in our beauty lounge services and are always striving to enhance your experience. To ensure we continue to meet your expectations and provide the highest quality service, we kindly ask for a few moments of your time to complete this short survey. Your feedback is incredibly important to us, as it helps us understand your needs, preferences, and areas where we can improve. Thank you for being an essential part of our journey to excellence.</p>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>1. How often do you visit You Salon & MedSpa?</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (['Weekly', 'Bi-weekly', 'Monthly', 'Rarely', 'This is my first visit'] as $choice)
                      @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="radio" value="{{ $choice }}" name="question-1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <h1>2. Are you aware that You Salon & MedSpa offers Aesthetic services?</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (['Yes', 'No'] as $choice)
                      @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="radio" value="{{ $choice }}" name="question-2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <h1>3. Have you ever used any Aesthetic services at You Salon & MedSpa?</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (['Yes', 'No'] as $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="radio" value="{{ $choice }}" name="question-3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>4. If yes, which services have you used? (Select all that apply)</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (['Botox', 'Dermal Fillers', 'Hair Removal', 'HydraFacial', 'Sculptura', 'Weight Loss Clinic Membership'] as $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="checkbox" value="{{ $choice }}" name="question-4" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                      <x-text-input type="text" name="question-4-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>5. If no, what has prevented you from trying our med spa services? (Select all that apply)</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (['Unaware of the services', 'Not interested in med spa treatments', 'Concerns about cost', 'Concerns about safety', 'Prefer other providers'] as $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="checkbox" value="{{ $choice }}" name="question-5" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                      <x-text-input type="text" name="question-5-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>6. How interested are you in the following med spa services? (Rate each from 1 to 5, with 1 being not interested and 5 being very interested)</h1>
                  <div class="flex flex-col gap-4 p-5 overflow-auto border border-gray-300 rounded-md shadow-sm">
                    <table>
                      <thead>
                        <tr>
                          <th class="text-left min-w-10">Service</th>
                          @for ($i=5; $i>=1; $i--)
                          <th>{{ $i }}</th>
                          @endfor
                        </tr>
                      </thead>
                      <tbody>
                      @foreach (['Botox', 'Dermal Fillers', 'Hair Removal', 'Lumecca-IPL', 'HydraFacial', 'Sculptura', 'Weight Loss Clinic Membership', 'Vitamin Shots'] as $key => $choice)
                        @php
                          $randId = uniqid()
                        @endphp
                        <tr>
                          <td>{{ $choice }}</td>
                          @for ($i=5; $i>=1; $i--)
                              <td class="p-2">
                                <input id="{{ $randId }}-{{ $i }}" type="radio" value="{{ $i }}" name="question-6-{{ $key }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                              </td>
                          @endfor
                        </tr>
                      @endforeach
                        {{-- <tr>
                          <td>
                            <x-text-input type="text" name="question-6-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                          </td>
                          @for ($i=5; $i>=1; $i--)
                              <td class="p-2">
                                <input id="question-6-other-{{ $i }}" type="radio" value="{{ $i }}" name="question-6-other-value" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                              </td>
                          @endfor
                        </tr> --}}
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>7. What factors influence your decision to choose a med spa service provider? (Select all that apply)</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (['Reputation and reviews', 'Quality of services', 'Cost of services', 'Recommendations from friends/family', 'Professional qualifications of staff', 'Convenient location', 'Promotional offers'] as $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="checkbox" value="{{ $choice }}" name="question-7" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                      <x-text-input type="text" name="question-7-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>8. How important are the following aspects when considering med spa treatments? (Rate each from 1 to 5, with 1 being not important and 5 being very important)</h1>
                  <div class="flex flex-col gap-4 p-5 overflow-auto border border-gray-300 rounded-md shadow-sm">
                    <table>
                      <thead>
                        <tr>
                          <th class="text-left min-w-10">Service</th>
                          @for ($i=5; $i>=1; $i--)
                          <th>{{ $i }}</th>
                          @endfor
                        </tr>
                      </thead>
                      <tbody>
                      @foreach (['Safety and hygiene', 'Expertise of the practitioners', 'Latest technology and equipment', 'Comfortable and relaxing environment', 'Personalized treatment plans', 'Cost and payment options', 'Follow-up care and support'] as $key => $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                        <tr>
                          <td>{{ $choice }}</td>
                          @for ($i=5; $i>=1; $i--)
                              <td class="p-2">
                                <input id="{{ $randId }}-{{ $i }}" type="radio" value="{{ $i }}" name="question-8-{{ $key }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                              </td>
                          @endfor
                        </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <h1>9. What additional services or improvements would you like to see in our You Aesthetics med spa offerings?</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      <textarea name="question-9" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write here..."></textarea>
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <h1>10. Any additional comments or suggestions?</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      <textarea name="question-10" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write here..."></textarea>
                  </div>
                  </div>
              </div>

            </div>
          </form>
        </main>
    </div>
    </body>
</html>
