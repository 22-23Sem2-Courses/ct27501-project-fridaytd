<div id="padtop">
    <form action='' class='form'>
        <p class='field required'>
            <label class='label required' for='name'>TÊN SẢN PHẨM</label>
            <input class='text-input' id='name' name='name' required type='text' placeholder='Ô Long'>
        </p>
        <div class='field'>
            <label class='label'>Phân loại</label>
            <ul class='options'>
                <li class='option'>
                    <input class='option-input' id='option-0' name='option' type='radio' value='tea'>
                    <label class='option-label' for='option-0'>Trà</label>
                </li>
                <li class='option'>
                    <input class='option-input' id='option-1' name='option' type='radio' value='Coffee'>
                    <label class='option-label' for='option-1'>Cafe</label>
                </li>
                <li class='option'>
                    <input class='option-input' id='option-2' name='option' type='radio' value='Other'>
                    <label class='option-label' for='option-2'>Khác</label>
                </li>
            </ul>
        </div>
        <p class='field'>
            <label class='label' for='about'>Mô tả</label>
            <textarea class='textarea' cols='50' id='about' name='description' rows='4'></textarea>
        </p>
        <p class='field half'>
            <label class='label' for='price'>Giá</label>
            <input class='number' id='price' name='price' type='phone'>
        </p>
        <p class='field half'>
            <input class='button' type='submit' value='Send'>
        </p>
    </form>
</div>