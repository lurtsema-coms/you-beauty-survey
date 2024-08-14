<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100">
      @if (session('success'))
      <div class="max-w-4xl mx-auto space-y-6 sm:px-6 lg:px-8">
        <div id="toast-success" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
              </svg>
              <span class="sr-only">Check icon</span>
          </div>
          <div class="text-sm font-semibold ms-3">{{ session('success') }}</div>
          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
          </button>
        </div>
      </div>
      @endif
      @if($errors->any() || session('error'))
      <div class="max-w-4xl mx-auto space-y-6 sm:px-6 lg:px-8">
        <div id="toast-danger" class="flex items-center w-full p-4 mt-10 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
          <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
              </svg>
              <span class="sr-only">Error icon</span>
          </div>
          <div class="text-sm font-normal ms-3">{{ session('error') ?: 'Please answer all required fields.' }}</div>
          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-danger" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
          </button>
        </div> 
      </div>
      @endif 
      <div id="loading-indicator" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
        <div class="flex items-center justify-center w-full h-full">
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
      <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 text-center md:p-5">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="text-lg font-normal text-gray-500">Submit this response?</h3>
                    <p class="mb-5 italic text-gray-500">You won't be able to revert this action.</p>
                    <button data-modal-hide="popup-modal" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" onclick="submitForm()">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

      <div class="min-h-screen">
        <main class="my-12">
          <form id="response-form" action="{{ route('response.store') }}" method="POST">
            @csrf
            <div class="max-w-4xl mx-auto space-y-6 sm:px-6 lg:px-8">
              <div class="flex items-start justify-between p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="relative w-20 h-20 overflow-hidden">
                      <img src="{{ asset('logo.png') }}" alt="">
                    </div>
                    <h1 class="text-lg font-bold">You Salon & MedSpa Customer Survey</h1>
                    <p class="text-sm text-gray-500">We greatly appreciate your trust in our beauty lounge services and are always striving to enhance your experience. To ensure we continue to meet your expectations and provide the highest quality service, we kindly ask for a few moments of your time to complete this short survey. Your feedback is incredibly important to us, as it helps us understand your needs, preferences, and areas where we can improve. Thank you for being an essential part of our journey to excellence.</p>
                </div>
                <x-primary-button type="button" onclick="exportResponses()">
                    {{ __('Export Responses') }}
                </x-primary-button>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1><span class="text-red-600">*</span> 1. {{ config('global.question_1.question') }} </h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (config('global.question_1.options') as $choice)
                      @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="radio" value="{{ $choice }}" name="question-1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1><span class="text-red-600">*</span> 2. {{ config('global.question_2.question') }}</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (config('global.question_2.options') as $choice)
                      @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="radio" value="{{ $choice }}" name="question-2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1><span class="text-red-600">*</span> 3. {{ config('global.question_3.question') }}</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (config('global.question_3.options')  as $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="radio" value="{{ $choice }}" name="question-3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>4. {{ config('global.question_4.question') }}</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (config('global.question_4.options')  as $index => $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="checkbox" value="1" name="question-4-{{ $index }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                      <x-text-input type="text" name="question-4-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>5. {{ config('global.question_5.question') }}</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (config('global.question_5.options')  as $index => $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="checkbox" value="1" name="question-5-{{ $index }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                      <x-text-input type="text" name="question-5-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>6. {{ config('global.question_6.question') }}</h1>
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
                      @foreach (config('global.question_6.options')  as $key => $choice)
                        @php
                          $randId = uniqid()
                        @endphp
                        <tr>
                          <td><span class="text-red-600">*</span> {{ $choice }}</td>
                          @for ($i=5; $i>=1; $i--)
                              <td class="p-2">
                                <input id="{{ $randId }}-{{ $i }}" type="radio" value="{{ $i }}" name="question-6-{{ $key }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
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
                  <h1>7. {{ config('global.question_7.question') }}</h1>
                  <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      @foreach (config('global.question_7.options')  as $index => $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                      <div class="flex items-center">
                        <input id="{{ $randId }}" type="checkbox" value="1" name="question-7-{{ $index }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                        <label for="{{ $randId }}" class="text-sm font-medium text-gray-900 ms-2">{{ $choice }}</label>
                      </div>
                      @endforeach
                      <x-text-input type="text" name="question-7-other" class="block w-full mt-1 text-sm" placeholder="Other (please specify):" />
                  </div>
                </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1>8. {{ config('global.question_8.question') }}</h1>
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
                      @foreach (config('global.question_8.options')  as $key => $choice)
                       @php
                          $randId = uniqid()
                      @endphp
                        <tr>
                          <td><span class="text-red-600">*</span> {{ $choice }}</td>
                          @for ($i=5; $i>=1; $i--)
                              <td class="p-2">
                                <input id="{{ $randId }}-{{ $i }}" type="radio" value="{{ $i }}" name="question-8-{{ $key }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2" required>
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
                  <h1><span class="text-red-600">*</span> 9. {{ config('global.question_9.question') }}</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      <textarea name="question-9" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write here..." required></textarea>
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                  <h1><span class="text-red-600">*</span> 10. {{ config('global.question_10.question') }}</h1>
                    <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                      <textarea name="question-10" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write here..." required></textarea>
                  </div>
                  </div>
              </div>

              <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="flex max-w-xl gap-4">
                    <x-primary-button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="bg-green-700">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </div>
            </div>
          </form>
        </main>
    </div>
    <script>
      function submitForm() {
        const form = document.getElementById('response-form');
        if (form?.reportValidity()) {
            form.submit();
            document.querySelector('#loading-indicator').classList.remove('hidden');
        }
      }

      function exportResponses() {
        const password = prompt('Please enter the password to export the responses:');

        if (password) {
          location.assign("{{ route('response.export') }}?password=" + password);
        }
      }
    </script>
    </body>
</html>
