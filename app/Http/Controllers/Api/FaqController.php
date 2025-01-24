<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Http\Resources\FaqListResource;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use App\Models\FaqTranslation;

class FaqController extends Controller
{
    public function index()
    {
        return FaqListResource::collection(Faq::with('translations')->get());
    }

    public function show(Faq $faq)
    {
        $faq->load(['translations' => function ($query) {
            $query->where('locale', request('locale', 'en'));
        }]);
        return new FaqResource($faq);
    }
    public function store(FAQRequest $request)
    {
        $validatedFaqData = $request->validated();
        $faq = Faq::create();
        return $this->createFaqTranslation($validatedFaqData, $faq->id);
    }

    public function update(FAQRequest $request, FaqTranslation $faq)
    {
        $validatedFaqData = $request->validated();
        $faq->update([
                'question' => $validatedFaqData['question'],
                'answer' => $validatedFaqData['answer'],
            ]);
        return $faq;
    }

    public function createFaqTranslation(mixed $validatedFaqData, $faqId)
    {
       return FaqTranslation::create([
            'locale' => $validatedFaqData['locale'],
            'question' => $validatedFaqData['question'],
            'answer' => $validatedFaqData['answer'],
            'faq_id' => $faqId
        ]);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->noContent();
    }
}
