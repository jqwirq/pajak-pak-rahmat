<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->numberBetween(1, 1000) * 100000;
        $quantity = $this->faker->numberBetween(1, 9);
        $total = $price * $quantity;
        $date = $this->faker->dateTimeBetween("-1 months", "+1 weeks");
        $is_taxed = $this->faker->boolean();
        $tax = 0;
        if ($is_taxed) {
            $tax = $total * config("global.tax");
        }
        $sub_total = $total - $tax;

        return [
            "item_name" => $this->faker->word(),
            "price" => $price,
            "date" => $date,
            "quantity" => $quantity,
            "sub_total" => $sub_total,
            "is_taxed" => $is_taxed,
            "tax" => $tax,
            "total" => $total,
        ];
    }
}
