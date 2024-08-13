<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Survey') }}
        </h2>
    </x-slot>
    @if (session('success'))
    <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
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
    <form id="surveyForm" autocomplete="off" action="{{ route('survey.store') }}" method="POST" class="my-6" x-data="survey">
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
                        <h3 class="text-lg font-normal text-gray-500">Are you sure you want to save this edit?</h3>
                        <p class="mb-5 italic text-gray-500">This will create a new version of the survey.</p>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" @click="submitForm">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
        @csrf
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="font-bold">Survey
                        @if ($activeSurvey->id)
                         <span class="text-sm italic text-gray-500">({{ $activeSurvey->id }})</span>
                         @endif
                    </h1>
                    <p class="text-sm text-gray-500">You Salon & MedSpa Customer Survey</p>
                </div>
            </div>

            <template x-for="(surveyQuestion, surveyQuestionIndex) in surveyQuestions" :key="surveyQuestionIndex">
                <div class="flex flex-col gap-8 p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                    <div class="max-w-xl">
                        <div>
                            <x-input-label :value="__('Question')" />
                            <x-text-input type="text" x-model="surveyQuestion.question" class="block w-full mt-1" required autofocus />
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <select x-model="surveyQuestion.type" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="open_ended">Open Ended</option>
                            </select>
                        </div>
                    </div>
                    <template x-if="surveyQuestion.type === 'multiple_choice'">
                        <div class="max-w-xl">
                            <x-input-label :value="__('Choices')" />
                            <div class="flex flex-col gap-4 p-5 border border-gray-300 rounded-md shadow-sm">
                                <template x-for="(choice, choiceIndex) in surveyQuestion.choices" :key="choice.key">
                                    <div class="flex items-center gap-3">
                                        <x-text-input x-model="choice.text" type="text" class="block w-full mt-1" required />
                                        <template x-if="surveyQuestion.choices.length > 2">
                                            <x-danger-button class="ms-3" type="button" @click="removeChoice(surveyQuestion, choiceIndex)">
                                                {{ __('Remove') }}
                                            </x-danger-button>
                                        </template>
                                    </div>
                                </template>
                                <x-primary-button class="w-fit" type="button" @click="addChoice(surveyQuestion)">
                                    {{ __('Add') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </template>
                    <div class="max-w-xl">
                        <x-danger-button type="button" @click="removeQuestion(surveyQuestionIndex)">
                            {{ __('Remove Question') }}
                        </x-danger-button>
                    </div>
                </div>
            </template>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="flex max-w-xl gap-4">
                    <x-primary-button type="button" @click="addQuestion">
                        {{ __('Add a Question') }}
                    </x-primary-button>
                    <x-primary-button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="bg-green-700" @click="openModal">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
        <input type="text" class="hidden" name="survey" id="surveyJson">
    </form>
    
    @section('scripts')
    <script>
        const activeSurvey = @json($activeSurvey);
        let questions = @json($questions);
        questions = questions.map(question => {
            return {
                key: question.id,
                question: question.question,
                type: question.type,
                choices: question.choices?.map(choice => {
                    return {
                        key: choice.id,
                        text: choice.choice,
                    }
                })
            }
        });
        
        document.addEventListener('alpine:init', () => {
            Alpine.data('survey', () => ({
                surveyQuestions: questions,

                addQuestion() {
                    this.surveyQuestions.push({
                        key: Math.random().toString(36),
                        question: '',
                        type: 'open_ended',
                        choices: [{key: Math.random().toString(36), text: ''}, {key: Math.random().toString(36), text: ''}],
                    });
                },

                removeQuestion(surveyQuestionIndex) {
                    this.surveyQuestions.splice(surveyQuestionIndex, 1);
                },

                addChoice(surveyQuestion) {
                    surveyQuestion.choices.push({ key: Math.random().toString(36), text: '' });
                },

                removeChoice(surveyQuestion, choiceIndex) {
                    surveyQuestion.choices.splice(choiceIndex, 1);
                },

                openModal() {
                    document.querySelector('#surveyJson').value = JSON.stringify(this.surveyQuestions);
                },

                submitForm() {
                    const form = document.querySelector('#surveyForm');
                    form.querySelectorAll('input select').forEach(element => element.setAttribute('required', true));
                    if (form.reportValidity()) {
                        form.submit();
                        document.querySelector('#loading-indicator').classList.remove('hidden');
                    }
                }
            }));
        });
    </script>
    @endsection
</x-app-layout>
