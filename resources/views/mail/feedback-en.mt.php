<?php
$speakerConferenceName = $new_conferences[0] ?? '';
$speakerConferenceKey = '';
$speakerAbstractUrl = '';
if (!empty($abstract_urls) && is_array($abstract_urls)) {
  foreach ($abstract_urls as $key => $url) {
    $speakerConferenceKey = (string) $key;
    $speakerAbstractUrl = (string) $url;
    break;
  }
}
$speakerConferenceShortMap = [
  'ai' => 'FIFI',
  'fsft' => 'FSFT',
  'drone' => 'FDFV',
  'ftfl' => 'FTFL',
];
$speakerConferenceDateMap = [
  'ai' => 'May 18, 2026',
  'fsft' => 'May 19, 2026',
  'drone' => 'May 20, 2026',
  'ftfl' => 'May 21, 2026',
];
$speakerConferenceShort = $speakerConferenceShortMap[$speakerConferenceKey] ?? strtoupper($speakerConferenceKey);
$speakerConferenceDate = $speakerConferenceDateMap[$speakerConferenceKey] ?? '';
$speakerRequirementsUrl = $speakerAbstractUrl;
?>



  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html>

  <head>
    <!-- Compiled with Bootstrap Email version: 1.8.0 -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
      body,
      table,
      td {
        font-family: Helvetica, Arial, sans-serif !important
      }

      .ExternalClass {
        width: 100%
      }

      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 150%
      }

      a {
        text-decoration: none
      }

      * {
        color: inherit
      }

      a[x-apple-data-detectors],
      u+#body a,
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit
      }

      img {
        -ms-interpolation-mode: bicubic
      }

      table:not([class^=s-]) {
        font-family: Helvetica, Arial, sans-serif;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        border-spacing: 0px;
        border-collapse: collapse
      }

      table:not([class^=s-]) td {
        border-spacing: 0px;
        border-collapse: collapse
      }

      @media screen and (max-width: 600px) {

        .w-full,
        .w-full>tbody>tr>td {
          width: 100% !important
        }

        *[class*=s-lg-]>tbody>tr>td {
          font-size: 0 !important;
          line-height: 0 !important;
          height: 0 !important
        }

        .s-2>tbody>tr>td {
          font-size: 8px !important;
          line-height: 8px !important;
          height: 8px !important
        }

        .s-3>tbody>tr>td {
          font-size: 12px !important;
          line-height: 12px !important;
          height: 12px !important
        }

        .s-5>tbody>tr>td {
          font-size: 20px !important;
          line-height: 20px !important;
          height: 20px !important
        }

        .s-10>tbody>tr>td {
          font-size: 40px !important;
          line-height: 40px !important;
          height: 40px !important
        }
      }
    </style>
  </head>

  <body class="bg-light" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F7FAFC">
    <table class="bg-light body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F7FAFC">
      <tbody>
        <tr>
          <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#F7FAFC">
            <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
              <tbody>
                <tr>
                  <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                    <!--[if (gte mso 9)|(IE)]>
                      <table align="center" role="presentation">
                        <tbody>
                          <tr>
                            <td width="600">
                    <![endif]-->
                    <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                      <tbody>
                        <tr>
                          <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                            <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="card" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #E2E8F0;" bgcolor="#FFFFFF">
                              <tbody>
                                <tr>
                                  <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left" bgcolor="#FFFFFF">
                                    <table class="card-body" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                      <tbody>
                                        <tr>
                                          <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 20px;" align="left">
                                            <h1 class="h3" style="padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;" align="left">
                                              <?= $registration_type === 'speaker' ? 'Confirmation - ' . htmlspecialchars($speakerConferenceShort) . ' Registration' : 'GDE Conference Registration' ?>
                                            </h1>
                                            <table class="s-2 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td style="line-height: 8px; font-size: 8px; width: 100%; height: 8px; margin: 0;" align="left" width="100%" height="8">
                                                    &#160;
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <h5 class="text-teal-700" style="color: #13795B; padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 20px; line-height: 24px; margin: 0;" align="left">
                                              <?= $registration_type === 'speaker' ? 'Dear Speaker,' : 'Dear ' . htmlspecialchars($name) . ',' ?>
                                            </h5>
                                            <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                    &#160;
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                              <tbody>
                                                <tr>
                                                  <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #E2E8F0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                    &#160;
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                            <div class="space-y-3">
                                              <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                Participation type: <strong><?= htmlspecialchars($participation_type ?? '') ?></strong>
                                              </p>
                                              <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                      &#160;
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <?php if ($registration_type === 'speaker'): ?>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  We hereby inform you that we have recorded your registration submitted for the <strong><?= htmlspecialchars($speakerConferenceName) ?></strong> conference (<?= htmlspecialchars($speakerConferenceDate) ?>), organized within the Dennis Gabor Digital Horizons Week.
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  As the next step, please upload the abstract related to your presentation using the following link:
                                                  <a href="<?= htmlspecialchars($speakerAbstractUrl) ?>" style="color: #0d6efd; text-decoration: underline;"><?= htmlspecialchars($speakerAbstractUrl) ?></a>
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  You can find information about formal and content requirements for abstracts HERE:
                                                  <a href="<?= htmlspecialchars($speakerRequirementsUrl) ?>" style="color: #0d6efd; text-decoration: underline;"><?= htmlspecialchars($speakerRequirementsUrl) ?></a>.
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  Submission deadline: <strong>April 20, 2026.</strong>
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  After the professional evaluation of abstracts, we will send a notification of acceptance or rejection by April 27, 2026 at the latest. Unfortunately, abstracts received after the deadline cannot be accepted and will not be evaluated.
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  If you encounter any technical issues during upload, please contact us via the official conference contact details.
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  Best regards,<br>
                                                  <strong>Organizing Committee<br><?= htmlspecialchars($speakerConferenceShort) ?><br>Dennis Gabor Digital Horizons Week<br>Gabor Denes University</strong>
                                                </p>
                                              <?php else: ?>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  Thank you for registering for the Dennis Gabor Digital Horizons Week as an <strong>Attendee</strong>.
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <?php if (!empty($new_conferences)): ?>
                                                  <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                    <strong>You have just registered for the following conferences:</strong>
                                                  </p>
                                                  <ul style="padding-left: 20px;">
                                                    <?php foreach ($new_conferences as $conference): ?>
                                                      <li class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568;"><?= $conference ?></li>
                                                    <?php endforeach; ?>
                                                  </ul>
                                                  <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                    <tbody>
                                                      <tr>
                                                        <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                          &#160;
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                <?php endif; ?>
                                                <?php if (!empty($existing_conferences)): ?>
                                                  <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                    <strong>You were previously registered for the following conferences:</strong>
                                                  </p>
                                                  <ul style="padding-left: 20px;">
                                                    <?php foreach ($existing_conferences as $conference): ?>
                                                      <li class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568;"><?= $conference ?></li>
                                                    <?php endforeach; ?>
                                                  </ul>
                                                  <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                    <tbody>
                                                      <tr>
                                                        <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                          &#160;
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                <?php endif; ?>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  We look forward to seeing you at the conference!
                                                </p>
                                                <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                        &#160;
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  Best regards,<br>
                                                  <strong>Dennis Gabor Digital Horizons Week Team</strong>
                                                </p>
                                              <?php endif; ?>
                                              <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                      &#160;
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                If you have any questions or run into any issues, please write to
                                                <a href="mailto:test@test.hu" style="color: #0d6efd; text-decoration: underline;">test@test.hu</a>.
                                              </p>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                              <tbody>
                                <tr>
                                  <td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">
                                    &#160;
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                    </td>
                  </tr>
                </tbody>
              </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>

  </html>
