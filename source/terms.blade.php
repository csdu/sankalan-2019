@extends('_layouts.master')
@section('title', 'Terms | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h2 class="banner-title">Terms</h2>
        <p>By using the ducs.in website and registering for Sankalan, you agree to our terms of service and accept our privacy policy.</p>
    </div>
</div>
<div class="content">
    <div class="section bg-white about" style="max-width: 800px;margin: 1em auto;">
        <h2 style="text-align:center;">Privacy Policy</h2>
        <p>This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service.</p>
        <p>If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information
            with anyone except as described in this Privacy Policy.</p>
        <p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible below, unless otherwise defined in this Privacy Policy.</p>
        <h4>Information Collection and Use</h4>
        <p>For a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, email and organisation you work with. The information that
            we collect will be used to contact or identify you.</p>
        <h4>Log Data</h4>
        <p>We want to inform you that whenever you visit our Service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer’s Internet Protocol (“IP”) address, browser version,
            pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.</p>
        <p>We make use of <a href="http://analytics.google.com" target="_blank" rel="noopener">Google Analytics</a> to monitor the behaviour of our site users.</p>
        <p>At our server, we make use of <a href="https://aws.amazon.com/cloudwatch/" target="_blank" rel="noopener">Amazon Cloudwatch</a> service to track requests from users.</p>
        <p>So, our privacy policy extends to the privacy policy of these services also.</p>
        <h4>Cookies</h4>
        <p>Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer’s hard drive.</p>
        <p>Our website uses these “cookies” to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer, by the means of your browser. If you choose
            to refuse our cookies, you may not be able to use some portions of our Service.</p>
        <h4>Service Providers</h4>
        <p>We may employ third-party companies and individuals due to the following reasons:</p>
        <ul>
            <li>To facilitate our Service;</li>
            <li>To provide the Service on our behalf;</li>
            <li>To perform Service-related services; or</li>
            <li>To assist us in analyzing how our Service is used.</li>
        </ul>
        <p>We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any
            other purpose.</p>
        <h4>Security</h4>
        <p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure
            and reliable, and we cannot guarantee its absolute security.</p>
        <h4> Links to Other Sites</h4>
        <p>Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these
            websites, more helpful hints. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>
        <h4>Changes to This Privacy Policy</h4>
        <p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately,
            after they are posted on this page.</p>
        <h4>Contact Us</h4>
        <p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to <a class="xhr" data-id="terms-contact" href="{{ $page->baseUrl }}/contact">contact us</a>.</p>
    </div>
    <div class="section bg-white about" style="max-width: 800px;margin: 1em auto;">
        <h2 style="text-align:center;">Terms</h2>
        <h3>Terms of use for website</h3>
        <p>You agree to the following terms when you use our website (*.ducs.in):</p>
        <ul>
            <li>You agree to the privacy policy above.</li>
            <li>We try our best to keep your private information safe with us. But we are not responsible for any potential theft of your information, whether by our mistake or by some mistake of yours. We will try our best to support you.</li>
            <li>Your name and content you create with us can be used for promotional purposes on other media.</li>
            <li>We will store the following information about you when you register through our "Sankalan Dashboard" with your Google Account: displayName, email id, Google user id, Google+ information like organisation you work with, your mobile number.
                Temporarily, some more information is available to us, but we do not make use of that information.</li>
            <li>You must not to misuse the contact and personnel details provided to you for your convenience at various pages on this website.</li>
            <li>You must not exploit the website's weaknesses (if you find any) to cause harm to the website, or the organisation of this website or other users using this website.</li>
            <li>You are free to go through the source code of our website which is available at:<br/> &nbsp;&mdash; <a href="https://github.com/csdu/sankalan" target="_blank" rel="noopener">https://github.com/csdu/sankalan</a>
                <br/> &nbsp;&mdash; <a href="https://github.com/csdu/sankalan-portal" target="_blank" rel="noopener">https://github.com/csdu/sankalan-portal</a>
                <br/> If you find any issues with the website, feel free to report it on Github or contact us.</li>
        </ul>
        <h3>Terms of service for Sankalan 2019</h3>
        <p>By registering for Sankalan 2019 through our website or service provided at registration desk, you agree to the following terms:</p>
        <ul>
            <li>You are required to pay a registration fee at the registration desk, on behalf of your team, in order to be able to participate in Sankalan.</li>
            <li>You must not misuse any technology available to you to cause damage to Sankalan (its website, its organisation and the other people participating in the event).</li>
            <li>You must follow the guidelines provided to you during the event.</li>
            <li>You must agree to the rules and conditions provided for each event in which you participate.</li>
            <li>You will respect the organisers and other participants at the event.</li>
            <li>General guidelines for a good public behaviour are also valid here.</li>
            <li>If you're caught violating the terms of service, you are eligible for immediate disqaulification from the event and a potential ban for future events. We may also report your violations to the organisation you work with. Strict action will
                be taken against strict violations.</li>
        </ul>
    </div>
</div>
@endsection