<?php

namespace App\Notifications;

use App\Http\Controllers\ProductController as ControllersProductController;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;;

use Illuminate\Notifications\Messages\DatabaseMessage;;

class ProductInserted extends Notification
{
    use Queueable;

    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'product_name' => $this->product->name,
            'product_id' => $this->product->id,
            'message' => 'A new product has been added to the database.',
        ];
    }
}
