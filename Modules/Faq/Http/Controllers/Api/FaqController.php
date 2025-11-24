<?php

namespace Modules\Faq\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Faq\Entities\Faq;
use Modules\Faq\Http\Requests\FAQRequest;
use Modules\Faq\Transformers\FaqListResource;
use Modules\Faq\Transformers\FaqResource;

class FaqController extends Controller
{
    public function index()
    {
        return FaqListResource::collection(Faq::all());
    }

    public function show(Faq $faq)
    {
        return new FaqResource($faq);
    }

    public function store(FAQRequest $request)
    {
        $validatedFaqData = $request->validated();

        $faq = new Faq();
        $faq->setTranslation('question', $validatedFaqData['locale'], $validatedFaqData['question']);
        $faq->setTranslation('answer', $validatedFaqData['locale'], $validatedFaqData['answer']);
        $faq->save();

        return new FaqResource($faq);
    }

    public function update(FAQRequest $request, Faq $faq)
    {
        $validatedFaqData = $request->validated();

        $faq->setTranslation('question', $validatedFaqData['locale'], $validatedFaqData['question']);
        $faq->setTranslation('answer', $validatedFaqData['locale'], $validatedFaqData['answer']);
        $faq->save();

        return new FaqResource($faq);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->noContent();
    }
}
