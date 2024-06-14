<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $category = FaqCategory::create(['name' => 'General Questions']);
        $naturecategory = FaqCategory::create(['name' => 'Nature']);

        
        Faq::create([
            'question' => 'What is this site about?',
            'answer' => 'This site allows users to post pictures and make posts for the city Sint-Pieters-Leeuw.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => 'How can I create an account?',
            'answer' => 'You can create an account by clicking on the register button on the top right corner.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => 'How can I submit a post to the blog?',
            'answer' => 'To submit a post to the blog, simply navigate to the "Create" page from the menu, fill out the required fields including title, content, and optionally an image, and then click the submit button.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => 'Can I submit multiple pictures with my post?',
            'answer' => 'Unfortunately, this has not been made possible yet. We are striving to improve the site and hope the feature will be added as soon as possible.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => 'Are there any restrictions on the content I can post?',
            'answer' => 'While we encourage users to share their experiences and insights about the city, we do have some guidelines in place. Please avoid posting offensive or inappropriate content, and ensure that your post is relevant to the theme of the blog.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => 'How long does it take for my post to appear on the blog?',
            'answer' => 'Once you submit your post, it will immediately be made visible.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => "Can I edit or delete my post after it's been submitted?",
            'answer' => "Yes, you can edit or delete your post after it's been submitted. Simply locate the post you want to edit or delete, and use the provided options.",
            'category_id' => $category->id,
        ]);

        

        Faq::create([
            'question' => "Can I share my post on social media?",
            'answer' => ' Yes, you can easily share your post on social media platforms such as Facebook, Twitter, and Instagram. Simply copy the url and share it.',
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => "Are there any opportunities to collaborate or contribute to the blog?",
            'answer' => "We're always open to collaboration and contributions from members of the community. If you have ideas for collaboration or would like to contribute content to the blog, please reach out to us through the contact form on our website.",
            'category_id' => $category->id,
        ]);

        Faq::create([
            'question' => "Can i post pictures of my garden?",
            'answer' => "Of course! We encourage all of our users to post whatever they want, as long as the post stays appropriate and fits the category",
            'category_id' => $naturecategory->id,
        ]);
    }
}