				<li>
                  <a href="shop-item.html"><img src="{{ asset('theme/frontend/assets/pages/img/cart-img.jpg') }}" alt="{{ $item->name }}" width="37" height="34"></a>
                  <span class="cart-content-count">x {{ $item->qty }}</span>
                  <strong><a href="shop-item.html">{{ $item->name }}</a></strong>
                  <em>${{ $item->subtotal }}</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>