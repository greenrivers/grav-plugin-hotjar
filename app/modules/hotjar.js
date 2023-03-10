/**
 * @author Greenrivers
 * @copyright Copyright (c) 2023 Greenrivers
 */

import $ from 'jquery';

export default function hotjar() {
    $.ajax({
        url: '/site/plugins/hotjar/config',
        type: 'GET'
    }).done((data) => {
        const {hjid, hjsv} = data;

        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: hjid, hjsv: hjsv};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    }).fail((data) => {
        console.error(data);
    })
}
