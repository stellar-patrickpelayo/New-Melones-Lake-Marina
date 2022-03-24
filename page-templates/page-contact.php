<?php /* Template Name: Contact Template */ ?>

<?php get_header();?>
<main class='contact general-page'>
    <div class='title-header header-background'>
        <div class='title-wrapper'>
            <h1>Local Attractions</h1>
        </div>
    </div>
        
    <div class='lower-section'>
        <div class='contant-column-wrapper'>
            <div class='information-wrapper'>

            </div>

            <div class='form-wrapper'>
                <h4>Get in Touch</h4>
                <form>
                    <div class='name-wrapper'>
                        <span class='fake-label'>Name</span>
                        <div class='first-name'>
                            <input type='text' id='formFirstName' name='formFirstname'>
                            <label for='formFirstName'>First</label>
                        </div>
                    
                        <div class='last-name'>
                            <input type='text' id='formLastName' name='formLastName'>
                            <label for='formLastName'>Last</label>
                        </div>
                    </div>

                    <div class='email-wrapper'>
                        <label for='formEmail'>Email</label>
                        <input type='text' id='formEmail' name='formEmail'>
                    </div>          
                    
                    <div class='phone-wrapper'>
                        <label for='formPhone'>Phone</label>
                        <input type='tel' id='formPhone' name='formPhone'>
                    </div>

                    <div class='message-wrapper'>
                        <label for='formMessage'>Message</label>
                        <textarea id='formMessage' name='formMessage' rows='10' cols='50'></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php get_footer();?>