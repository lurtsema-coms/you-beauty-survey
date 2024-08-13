<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Survey') }}
        </h2>
    </x-slot>
    <form id="surveyForm" autocomplete="off" action="{{ route('survey.store') }}" method="POST" class="py-12" x-data="survey">
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
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to save this edit?</h3>
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
                    <h1 class="font-bold">Survey Questions</h1>
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
        document.addEventListener('alpine:init', () => {
            Alpine.data('survey', () => ({
                surveyQuestions: [
                    {
                        key: Math.random().toString(36),
                        question: 'How often do you visit You Salon & MedSpa?',
                        type: 'multiple_choice',
                        choices: [
                            { key: Math.random().toString(36), text: 'Weekly' },
                            { key: Math.random().toString(36), text: 'Bi-weekly' },
                            { key: Math.random().toString(36), text: 'Monthly' },
                            { key: Math.random().toString(36), text: 'Rarely' },
                            { key: Math.random().toString(36), text: 'This is my first visit' },
                        ],
                    }
                ],

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
                    }
                }
            }));
        });
    </script>
    @endsection
</x-app-layout>
