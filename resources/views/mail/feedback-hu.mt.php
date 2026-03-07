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
  'ai' => '2026. május 18.',
  'fsft' => '2026. május 19.',
  'drone' => '2026. május 20.',
  'ftfl' => '2026. május 21.',
];
$speakerConferenceShort = $speakerConferenceShortMap[$speakerConferenceKey] ?? strtoupper($speakerConferenceKey);
$speakerConferenceDate = $speakerConferenceDateMap[$speakerConferenceKey] ?? '';
$speakerRequirementsUrl = $speakerAbstractUrl;
?>














<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <!-- Compiled with Bootstrap Email version: 1.8.0 --><meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
      body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-full,.w-full>tbody>tr>td{width:100% !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-2>tbody>tr>td{font-size:8px !important;line-height:8px !important;height:8px !important}.s-3>tbody>tr>td{font-size:12px !important;line-height:12px !important;height:12px !important}.s-5>tbody>tr>td{font-size:20px !important;line-height:20px !important;height:20px !important}.s-10>tbody>tr>td{font-size:40px !important;line-height:40px !important;height:40px !important}}
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
                                              <?= $registration_type === 'speaker' ? 'Visszaigazol&#225;s &#8211; ' . htmlspecialchars($speakerConferenceShort) . ' regisztr&#225;ci&#243;' : 'GDE Konferencia Regisztr&#225;ci&#243;' ?>
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
                                              <?= $registration_type === 'speaker' ? 'Tisztelt El&#337;ad&#243;!' : 'Kedves ' . htmlspecialchars($name) . '!' ?>
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
                                                Jelentkez&#233;s m&#243;dja: <strong><?= htmlspecialchars($participation_type ?? '') ?></strong>
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
                                                  Ezúton tájékoztatjuk, hogy a Dennis Gabor Digital Horizons Week keretében megrendezésre kerülő <strong><?= htmlspecialchars($speakerConferenceName) ?></strong> konferenciára (<?= htmlspecialchars($speakerConferenceDate) ?>) benyújtott regisztrációját rögzítettük.
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
                                                  Kérjük, következő lépésben töltse fel az előadásához kapcsolódó absztraktot az alábbi linken keresztül:
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
                                                  Az absztrakt formai és tartalmi követelményeire vonatkozó tudnivalókat ITT
                                                  <a href="<?= htmlspecialchars($speakerRequirementsUrl) ?>" style="color: #0d6efd; text-decoration: underline;"><?= htmlspecialchars($speakerRequirementsUrl) ?></a>
                                                  találja.
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
                                                  Benyújtási határidő: <strong>2026. április 20.</strong>
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
                                                  Az absztraktok szakmai elbírálását követően legkésőbb 2026. április 27-ig értesítést küldünk az elfogadásról vagy elutasításról. A határidő után érkező absztraktokat sajnos nem áll módunkban elfogadni, így azok nem kerülnek bírálat alá.
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
                                                  Amennyiben technikai kérdés merül fel a feltöltés során, kérjük, jelezze a konferencia hivatalos elérhetőségén.
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
                                                  Üdvözlettel,<br>
                                                  <strong>Szervezőbizottság<br><?= htmlspecialchars($speakerConferenceShort) ?><br>Dennis Gabor Digital Horizons Week<br>Gábor Dénes Egyetem</strong>
                                                </p>
                                              <?php else: ?>
                                                <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4A5568; width: 100%; margin: 0;" align="left">
                                                  Köszönjük, hogy regisztrált a Dennis Gabor Digital Horizons Week rendezvényére <strong>résztvevőként</strong>.
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
                                                    <strong>Most regisztrált a következő konferenciákra:</strong>
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
                                                    <strong>Korábban már regisztrált a következő konferenciákra:</strong>
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
                                                  Várjuk Önt szeretettel a konferencián!
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
                                                  Üdvözlettel,<br>
                                                  <strong>Dennis Gabor Digital Horizons Week Csapat</strong>
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
                                                Ha b&#225;rmilyen k&#233;rd&#233;s vagy probl&#233;ma mer&#252;lne fel, k&#233;rj&#252;k, &#237;rjon a
                                                <a href="mailto:test@test.hu" style="color: #0d6efd; text-decoration: underline;">test@test.hu</a>
                                                e-mail c&#237;mre.
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
