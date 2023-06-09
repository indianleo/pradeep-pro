import React, { Component } from 'react';
import'./style.css';
import {Button,Dialog,DialogActions  } from '@material-ui/core/';
import Spinner from 'react-bootstrap/Spinner';
import DialogContent from '@material-ui/core/DialogContent';
import DialogTitle from '@material-ui/core/DialogTitle';
import WarningIcon from '@material-ui/icons/Warning';
import MCQ from './MCQ/Mcqs'

export default class StudentDashboard extends Component {
    constructor(props) {
        super(props);
        this.state = {
            language:'hi',
            loading:false,
            startExam:false,
        };
    }

    componentWillMount(){
        let startExam = localStorage.getItem('startExam');
        console.log(startExam)
        if(startExam){
            this.setState({startExam:atob(startExam)})
        }
    }

    handleStart(){
        this.setState({loading:true})
    }

    startExam(){
        this.setState({startExam:true})
        localStorage.setItem('startExam',btoa(true))
    }

    render() {
        const{language,loading,startExam} = this.state;
        let content = <div className="m-4 h6">Please Start</div>;
        if(language === 'en'){
            content =  
                <div className="m-4 text-muted"  style={{textAlign:"justify"}}>
                    <div className="h4">INTRODUCTION</div>
                    <ol>
                        <li>
                            These instructions contain details pertaining to various aspects of the examination you are going to take and important instructions about the related matters. The assessment of answer sheets of ‘Objective-Multiple Choice Type’ will be done by a computerized machine. Hence, you should carefully read the instructions regarding handling of the answer sheet and the method of marking answers.
                        </li>
                        <li>
                            The Commission will reject at any stage, the candidature of any candidate who does not reach the eligibility criteria (cut-off) prescribed by the Commission in different papers at different stages of the examination.
                        </li>
                        <li>
                            Please note that since this is a competitive examination, you have to obtain a high rank in the order of merit to secure appointment. You should, therefore, put in your best efforts in the examination.
                        </li>
                    </ol>
                <div className="h4">GENERAL INSTRUCTIONS</div>
                    <ol>
                        <li>
                        Particulars to be noted: Please note carefully your Name, Roll Number, Ticket Number, date, time and venue for the examination given in the Admission Certificate. If any candidate finds any misprint/mistake in his/her Name, Roll Number, Ticket Number, Category, Address, etc., he should immediately get in touch with the concerned Regional Office and get the necessary correction made in the Admission Certificate. Seating plan will be displayed in the Venue as per Ticket Number.
                        </li>
                        <li>
                        Punctuality in Attendance: You should be present in the Examination Hall at least halfan-hour before the exam and you will not be allowed to leave the Examination Hall until the exam is over. Candidates arriving after commencement of the examination will not be permitted to enter the Examination Hall.
                        </li>
                        <li>
                            <ol type="I">
                            <li>
                            Admission Certificate: Admission Certificate bearing scanned photographs and signature will be issued to the candidates from the Regional/Sub-Regional Office of the Commission. You need not affix any photo on the Scanned Admission Certificate. The portion of the Admission Certificate with scanned photograph is to be surrendered to the invigilator. A few regional offices send the lists to the Venue Supervisor directly. You can also appear for the examination with Admission Certificate downloaded from website. Though it may not be required, you must always have a copy of your photograph readily available with you. You must also have a photo Identity Card readily available with you.
                            </li>
                            <li>
                            Photo Bearing Admission Certificate to be surrendered: You will not be permitted to appear for the examination if you do not bring the photo bearing Admission Certificate received by post or downloaded from website. You will be required to sign in the space provided for candidate’s signature and also affix your Left Thumb Impression on the Attendance sheet in the presence of the Invigilator in the Examination Hall.
                            </li>
                            </ol></li>
                        <li>
                        Compliance with instructions: You should scrupulously follow the instructions given by Supervisor and the Invigilator at all the stages of the examination. No books, slide rules, notebooks, pagers, mobile phones, written notes, calculators and other electronic gadgets will be allowed inside the examination hall. Candidate who is found either copying or receiving assistance will be disqualified. Candidate offering assistance to other candidates will also be disqualified.
                        </li>
                        <li>
                        Mobile phones, pagers, etc. are not allowed inside the examination Hall. Candidates who are found to possess Mobile or Cellular Phones, Pager and other unauthorized electronic gadgets after commencement of the examination, whether in use or not, will be deemed to be using unfair means and would be liable to disciplinary action as deemed fit, including ban from future examinations conducted by SSC. Their candidate will also be cancelled for the examination.
                        </li>
                        <li>
                        How to fill in the information on Answer Sheet: Detailed information has been provided on how to fill answer sheet on the answer sheet itself. Follow them meticulously.
                        </li>
                        <li>
                        Use of Black ink pen/black Ball pen: Use black ink pen/black Ball-Point pen for filling up the Part-A of Side 1, Part-B of Side I and Side 2 of the answer sheet.
                        </li>
                        <li>
                        Handling the Answer sheet: Please hand over the answer sheet with extreme care and keep it dust-free. If it is mutilated, torn, folded, wrinkled or rolled, it may not be evaluated by the machine. Answer sheets and question papers will be supplied in the Examination Hall. After the test is over, you should hand over the answer sheet to the Invigilator before leaving the room. Any candidate who does not hand over answer sheet or is found to attempting to take answer sheet out of the examination hall will be disqualified and the Commission will take further action against him as per rule. After the examination is over, the candidates will be allowed to take the question booklet with them.
                        </li>
                        <li>
                        Rough work to be done on the booklet: You should do the necessary rough work on test booklet/question paper. You SHOULD NOT do your rough work on the answer sheet or any other paper. If any rough work is done on the answer sheet your answer sheet will not be assessed.
                        </li>
                        <li>
                        One Single Answer sheet: With each question paper there will be a single answer sheet covering all parts with the same serial number. Use this answer sheet only. 11. Method of Showing Answers: All your answers should be marked in the answer sheet only.
                        </li>
                        <li>
                        Information on the Answer sheet: You should furnish and code all information required on the answer sheet such as Roll Number, Ticket Number, Name, Test Form Number, etc., failing which the answer sheet will not be evaluated and zero marks will be awarded. Answer sheet without signature of the candidate and Left Thumb Impression will also not be evaluated. It is the responsibility of the candidates to ensure that they sign in the space provided and also affix Left Thumb Impression. If the candidate belonging to SC, ST, OBC, Ex-S or PH category does not code his details, he will be treated as UR candidate.
                        </li>
                        <li>
                        Travelling allowance is not admissible for appearing for written examination for any candidate.
                        </li>
                    </ol>
                </div>
        }else if(language === 'hi'){
            content =  
                <div className="m-4 text-muted"  style={{textAlign:"justify"}}>
                    <div className="h4">INTRODUCTION</div>
                    <ol>
                        <li>
                            इन निर्देशों में परीक्षा के विभिन्न पहलुओं से संबंधित विवरण हैं जो आप लेने जा रहे हैं और संबंधित मामलों के बारे में महत्वपूर्ण निर्देश। Ive वस्तुनिष्ठ-बहुविकल्पी प्रकार ’की उत्तर पुस्तिकाओं का मूल्यांकन एक कम्प्यूटरीकृत मशीन द्वारा किया जाएगा। इसलिए, आपको उत्तर पुस्तिका को संभालने से संबंधित निर्देशों और उत्तरों को चिह्नित करने की विधि को ध्यान से पढ़ना चाहिए।                         </li>
                        <li>
                            आयोग किसी भी चरण में अस्वीकार करेगा, किसी भी उम्मीदवार की उम्मीदवारी जो परीक्षा के विभिन्न चरणों में आयोग द्वारा निर्धारित पात्रता मानदंडों (कट-ऑफ) तक नहीं पहुंचती है।
                        </li>
                        <li>
                            कृपया ध्यान दें कि चूंकि यह एक प्रतियोगी परीक्षा है, इसलिए आपको सुरक्षित नियुक्ति के लिए योग्यता के क्रम में एक उच्च रैंक प्राप्त करना होगा। इसलिए, आपको परीक्षा में अपना सर्वश्रेष्ठ प्रयास करना चाहिए।                        </li>
                    </ol>
                <div className="h4">GENERAL INSTRUCTIONS</div>
                    <ol>
                        <li>
                        ध्यान दिए जाने वाले विवरण: कृपया प्रवेश प्रमाणपत्र में दी गई परीक्षा के लिए अपना नाम, रोल नंबर, टिकट नंबर, तिथि, समय और स्थान को ध्यान से देखें। यदि किसी भी उम्मीदवार को उसके नाम, रोल नंबर, टिकट नंबर, श्रेणी, पता आदि में कोई गलत सूचना / गलती मिलती है, तो उसे तुरंत संबंधित क्षेत्रीय कार्यालय से संपर्क करना चाहिए और प्रवेश प्रमाणपत्र में आवश्यक सुधार प्राप्त करना चाहिए। बैठने की योजना टिकट नंबर के अनुसार वेन्यू में प्रदर्शित की जाएगी।
                            
                        </li>
                        <li>
                        उपस्थिति में समय की पाबंदी: आपको परीक्षा से कम से कम आधे घंटे पहले परीक्षा हॉल में उपस्थित होना चाहिए और परीक्षा समाप्त होने तक आपको परीक्षा हॉल छोड़ने की अनुमति नहीं दी जाएगी। परीक्षा शुरू होने के बाद आने वाले उम्मीदवारों को परीक्षा हॉल में प्रवेश करने की अनुमति नहीं दी जाएगी।

                        </li>
                        <li>
                            <ol type="I">
                            <li>
                            प्रवेश प्रमाण पत्र: आयोग के क्षेत्रीय / उप-क्षेत्रीय कार्यालय से उम्मीदवारों को स्कैन की गई तस्वीरों और हस्ताक्षर वाले प्रवेश प्रमाण पत्र जारी किए जाएंगे। आपको स्कैन किए गए एडमिशन सर्टिफिकेट पर किसी भी फोटो का प्रत्यय नहीं चाहिए। स्कैन किए गए फोटोग्राफ के साथ प्रवेश प्रमाण पत्र के हिस्से को पर्यवेक्षक को सौंप दिया जाना है। कुछ क्षेत्रीय कार्यालय सूची को सीधे पर्यवेक्षक को भेजते हैं। आप वेबसाइट से डाउनलोड किए गए प्रवेश प्रमाण पत्र के साथ परीक्षा के लिए भी उपस्थित हो सकते हैं। हालांकि इसकी आवश्यकता नहीं हो सकती है, आपके पास हमेशा आपके साथ आसानी से उपलब्ध आपके फोटोग्राफ की एक प्रति होनी चाहिए। आपके पास आसानी से एक फोटो पहचान पत्र भी उपलब्ध होना चाहिए।
                            </li>
                            <li>
                            फोटो असर प्रवेश प्रमाण पत्र को आत्मसमर्पण किया जाना चाहिए: यदि आप फोटो असर प्रवेश प्रमाण पत्र डाक द्वारा प्राप्त या वेबसाइट से डाउनलोड नहीं करते हैं, तो आपको परीक्षा में बैठने की अनुमति नहीं दी जाएगी। आपको उम्मीदवार के हस्ताक्षर के लिए उपलब्ध कराए गए स्थान पर हस्ताक्षर करने की आवश्यकता होगी और परीक्षा हॉल में निरीक्षक की उपस्थिति में उपस्थिति पत्रक पर अपने बाएं अंगूठे के निशान को भी चिपका दें।
                            </li>
                            </ol></li>
                        <li>
                        निर्देशों का अनुपालन: आपको परीक्षा के सभी चरणों में पर्यवेक्षक और पर्यवेक्षक द्वारा दिए गए निर्देशों का सावधानीपूर्वक पालन करना चाहिए। परीक्षा हॉल के अंदर कोई किताबें, स्लाइड नियम, नोटबुक, पेजर, मोबाइल फोन, लिखित नोट्स, कैलकुलेटर और अन्य इलेक्ट्रॉनिक गैजेट्स की अनुमति नहीं होगी। जो अभ्यर्थी नकल करते या सहायता प्राप्त करते हुए पाए जाते हैं उन्हें अयोग्य घोषित किया जाएगा। अन्य उम्मीदवारों को सहायता देने वाले उम्मीदवार भी अयोग्य घोषित किए जाएंगे।
                        </li>
                        <li>
                        परीक्षा हॉल के अंदर मोबाइल फोन, पेजर आदि की अनुमति नहीं है। जिन अभ्यर्थियों के पास मोबाइल या सेल्युलर फ़ोन, पेजर और अन्य अनधिकृत इलेक्ट्रॉनिक गैजेट्स हैं, जो परीक्षा शुरू होने के बाद, चाहे उपयोग में हों या न हों, अनुचित साधनों का उपयोग करने वाले माने जाएंगे और प्रतिबंधात्मक कार्रवाई के साथ अनुशासनात्मक कार्रवाई के लिए उपयुक्त होंगे, जिसमें प्रतिबंध शामिल है SSC द्वारा आयोजित भविष्य की परीक्षाओं से। उनके उम्मीदवार को भी परीक्षा के लिए रद्द कर दिया जाएगा।
                        </li>
                        <li>
                        उत्तर पुस्तिका पर जानकारी कैसे भरें: उत्तर पुस्तिका पर ही उत्तर पुस्तिका कैसे भरें, इसकी विस्तृत जानकारी दी गई है। उनका सावधानीपूर्वक पालन करें।
                        </li>
                        <li>
                        ब्लैक इंक पेन / ब्लैक बॉल पेन का उपयोग: उत्तर पुस्तिका के साइड 1, पार्ट-बी और साइड 2 के पार्ट-ए को भरने के लिए ब्लैक इंक पेन / ब्लैक बॉल-प्वाइंट पेन का उपयोग करें।
                        </li>
                        <li>
                        उत्तर पुस्तिका को संभालना: कृपया अत्यधिक सावधानी के साथ उत्तर पुस्तिका को सौंप दें और इसे धूल रहित रखें। यदि यह कटे-फटे, मुड़े हुए, झुर्रीदार या लुढ़के हुए हैं, तो मशीन द्वारा इसका मूल्यांकन नहीं किया जा सकता है। परीक्षा भवन में उत्तर पुस्तिकाओं और प्रश्न पत्रों की आपूर्ति की जाएगी। परीक्षण समाप्त होने के बाद, आपको कमरे से बाहर निकलने से पहले उत्तर पत्रक को अन्वेषक को सौंप देना चाहिए। कोई भी अभ्यर्थी जो उत्तर पुस्तिका नहीं सौंपता है या परीक्षा हॉल से उत्तर पुस्तिका निकालने का प्रयास करता पाया जाता है, उसे अयोग्य घोषित कर दिया जाएगा और आयोग उसके खिलाफ नियमानुसार आगे की कार्रवाई करेगा। परीक्षा समाप्त होने के बाद, उम्मीदवारों को प्रश्न पुस्तिका को अपने साथ ले जाने की अनुमति होगी।
                        </li>
                        <li>
                        बुकलेट पर किया जाने वाला कठिन काम: आपको टेस्ट बुकलेट / प्रश्न पत्र पर आवश्यक मोटा काम करना चाहिए। आप उत्तर पुस्तिका या किसी अन्य कागज पर अपना मोटा काम न करें। यदि उत्तर पुस्तिका पर कोई मोटा काम किया जाता है तो आपकी उत्तर पुस्तिका का मूल्यांकन नहीं किया जाएगा।
                        </li>
                        <li>
                        एक एकल उत्तर पत्रक: प्रत्येक प्रश्न पत्र के साथ एक ही उत्तर पुस्तिका होगी, जिसमें सभी भाग एक ही क्रमांक के साथ होंगे। इस उत्तर पुस्तिका का ही उपयोग करें। 11. उत्तर दिखाने की विधि: आपके सभी उत्तर केवल उत्तर पुस्तिका में अंकित होने चाहिए।
                        </li>
                        <li>
                        उत्तर पुस्तिका की जानकारी: आपको उत्तर पुस्तिका पर आवश्यक सभी जानकारी जैसे रोल नंबर, टिकट नंबर, नाम, टेस्ट फॉर्म नंबर इत्यादि को प्रस्तुत और कोडित करना चाहिए, यह विफल करने पर कि उत्तर पुस्तिका का मूल्यांकन नहीं किया जाएगा और शून्य अंक से सम्मानित किया जाएगा। । उम्मीदवार के हस्ताक्षर और लेफ्ट थम्ब इम्प्रेशन के बिना उत्तर पुस्तिका का मूल्यांकन भी नहीं किया जाएगा। यह सुनिश्चित करना उम्मीदवारों की जिम्मेदारी है कि वे प्रदान किए गए स्थान पर हस्ताक्षर करें और वाम अंगूठा छाप भी चिपकाएं। यदि SC, ST, OBC, Ex-S या PH श्रेणी से संबंधित उम्मीदवार अपने विवरण को कोड नहीं करते हैं, तो उन्हें UR उम्मीदवार माना जाएगा।
                        </li>
                        <li>
                        किसी भी उम्मीदवार के लिए लिखित परीक्षा के लिए यात्रा भत्ता स्वीकार्य नहीं है।
                        </li>
                    </ol>
                </div>    
        }

        return (
            (startExam)
            ?
            <MCQ />
            :
            <React.Fragment>
                
                <div>
                    <div className="language">
                        <span className="mr-4">Language: </span> 
                        <select className="select" value={language} onChange={(e)=>{this.setState({language:e.target.value})}} >
                            <option value="en">English</option>
                            <option value="hi">Hindi</option>
                        </select>
                    </div>
                </div>
                {content}
                <div className="form-group">
                    <div className="col-xs-10 col-sm-10 col-md-10 col-md-offset-3">
                        <Button
                            onClick={this.handleStart.bind(this)}
                            variant="contained"
                            type="submit"
                            className="w-100 p-3 bg-theme2 text-muted  mt-5"
                        >
                            {loading ? 
                                <Spinner
                                    as="span"
                                    animation="border"
                                    size="md"
                                    role="status"
                                    aria-hidden="true"
                                />
                            :
                                <strong>START</strong>
                            }
                        </Button>
                    </div>
                </div>
                
                <Dialog
                    fullWidth = {true}
                    maxWidth="sm"
                    open={loading}
                    onClose={()=>{this.setState({loading:false})}}
                    aria-labelledby="Start-Test"
                    aria-describedby="Are you Ready to Start Test?"
                    className="bg-muted"
                >
                    <DialogTitle id="alert-dialog-title" className="display-6 text-danger"><WarningIcon fontSize="small" />Warning</DialogTitle>
                <DialogContent>
                        <div className="mh-2">
                            Do you want to start the <strong>Test</strong>?
                        </div>
                </DialogContent>
                <DialogActions>
                    <Button
                        onClick={()=>this.setState({loading:false})}
                        variant="contained"                           
                    >
                        <strong>No</strong>
                    </Button>
                    <Button
                        onClick={()=>this.startExam()}
                        variant="contained"                           
                        className="mx-2"
                    >
                        <strong>YES</strong>
                    </Button>
                </DialogActions>
                </Dialog>
            </React.Fragment>
        )
    }
}
