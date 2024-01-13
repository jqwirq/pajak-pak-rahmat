<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1em;
        }
    </style>
    <title>Home</title>
</head>

<body>
    <header>
        <div class="navbar">
            <a href="/">Home</a>
            <a href="/items">Items</a>
            <a href="/salaries">Salaries</a>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>New Item</h1>

            <form method="POST" action="/items" id="formNewItem">
                @csrf
                <div class="group">
                    <label>Item Name</label>
                    <input type="text" name="item_name" id="itemName" minlength="2" required
                        style="flex-basis:500px;flex-shrink:1;">
                </div>
                <div class="group">
                    <label>Price</label>
                    <input type="date" name="date" id="date" required>

                </div>
                <div class="group">
                    <label>Price</label>
                    <input type="number" name="price" id="price" min="100" max="9999999999" required>

                </div>
                <div class="group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" id="quantity" min="1" max="1000000" required>
                </div>
                <div class="group">
                    <label>PPN 11%</label>
                    <input type="checkbox" name="is_taxed" id="isTax" style="cursor:pointer">
                </div>
                <div class="group">
                    <label>Sub Total</label>
                    <div>=&nbsp;<span id="subTotal">0</span></div>
                    <input type="hidden" name="sub_total" id="subTotalInput">
                    {{-- <input type="text" name="sub_total" id="subTotal"
                        style="background:transparent;padding:0;border:none;color:black" disabled> --}}
                </div>

                <div class="group">
                    <label>Tax</label>
                    <div>=&nbsp;<span id="taxSpan">0</span></div>
                    <input type="hidden" name="tax" id="taxInput">
                    {{-- <input type="text" name="tax" id="tax"
                        style="background:transparent;padding:0;border:none;color:black" disabled> --}}
                </div>
                <div class="group">
                    <label>Total</label>
                    <div>=&nbsp;<span id="total">0</span></div>
                    <input type="hidden" name="total" id="totalInput">
                    {{-- <input type="text" name="total" id="total"
                    style="background:transparent;padding:0;border:none;color:black" disabled> --}}
                </div>
                <button type="submit" style="margin-left:10%">submit</button>
            </form>
        </div>
    </main>

    <script>
        const formNewItemElement = document.getElementById("formNewItem");
        const priceElement = document.getElementById("price");
        const quantityElement = document.getElementById("quantity");
        const subTotalElement = document.getElementById("subTotal");
        const isTaxElement = document.getElementById("isTax");
        const taxSpanElement = document.getElementById("taxSpan");
        const totalElement = document.getElementById("total");
        const taxInputElement = document.getElementById("taxInput");
        const subTotalInputElement = document.getElementById("subTotalInput");
        const totalInputElement = document.getElementById("totalInput");
        let SUB_TOTAL_PRICE = 0;
        let TOTAL = 0;
        let PPN = 0.11; // LATER... NEED TO BE PASSED FROM LARAVEL CONFIG VARIABLE

        // formNewItemElement.addEventListener("submit", e => {
        //     e.preventDefault();
        //     console.log(e.target["tax"].value);
        //     // formNewItemElement.submit();
        // })

        priceElement.addEventListener("input", displayTotalChange);
        quantityElement.addEventListener("input", displayTotalChange);
        isTaxElement.addEventListener("change", displayTotalChange);

        function displayTotalChange(e) {
            const regex = /^[1-9]\d*/
            const price = priceElement.value;
            const quantity = quantityElement.value;
            const isTax = isTaxElement.checked;
            isTaxElement.value = isTax ? "1" : "0";
            // console.log(isTax);
            let tax = 0;
            let total = 0;
            let subTotal = 0;
            if (regex.test(price) && regex.test(quantity)) {
                total = parseInt(price) * parseInt(quantity);
                TOTAL = total;
                totalElement.innerText = total.toLocaleString("es-ES")
                if (isTax) {
                    tax = total * PPN;
                }
                totalInputElement.value = total.toString();
                taxInputElement.value = tax.toString();
                taxSpanElement.innerText = tax.toLocaleString("es-ES");
                subTotal = total - tax;
                SUB_TOTAL_PRICE = subTotal;
                subTotalInputElement.value = subTotal.toString();
                subTotalElement.innerText = subTotal.toLocaleString("es-ES");
            } else {
                subTotalElement.innerText = "0";
                taxSpanElement.innerText = "0";
                totalElement.innerText = "0";
            }
            // if (regex.test(txv) && SUB_TOTAL_PRICE) {
            //     const tot = SUB_TOTAL_PRICE + SUB_TOTAL_PRICE * (parseInt(txv) / 100);
            //     total.innerText = tot.toLocaleString("es-ES");
            // }
        }
    </script>
</body>

</html>
