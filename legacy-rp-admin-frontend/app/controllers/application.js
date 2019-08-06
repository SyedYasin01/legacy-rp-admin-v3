import Controller from '@ember/controller';
import { inject as service } from '@ember/service';

export default Controller.extend({
    // Inject in app-wide services.
    session: service(),
    currentUser: service(),

    actions: {
        /**
         * Invalidates the session.
         */
        invalidateSession() {
            this.session.invalidate();
        }
    }

});
