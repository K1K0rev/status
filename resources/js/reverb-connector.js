import { Connector } from 'laravel-echo';

class ReverbConnector extends Connector {
    connect() {
        this.socket = new WebSocket(
            `${this.options.scheme}://${this.options.host}:${this.options.port}/app/${this.options.key}`
        );

        this.socket.onmessage = (event) => {
            const data = JSON.parse(event.data);
            this.channels[data.channel]?.callbacks.forEach(callback => callback(data));
        };
    }
}

export default ReverbConnector;