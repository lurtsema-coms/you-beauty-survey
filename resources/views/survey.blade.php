<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Survey') }}
        </h2>
    </x-slot>
    <form autocomplete="off" class="py-12" x-data="survey">
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
                                        <x-danger-button class="ms-3" type="button" @click="removeChoice(surveyQuestion, choiceIndex)">
                                            {{ __('Remove') }}
                                        </x-danger-button>
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
                <div class="max-w-xl">
                    <x-primary-button type="button" @click="addQuestion">
                        {{ __('Add a Question') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
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
                        choices: [],
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
            }));
        });
    </script>
    @endsection
</x-app-layout>
