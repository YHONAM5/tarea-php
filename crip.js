document.addEventListener('DOMContentLoaded', function () {
    const tabs = {
        'clients-tab': 'clients-content',
        'providers-tab': 'providers-content',
        'sales-tab': 'sales-content'
    };

    function setActiveTab(activeTabId) {
        for (let tabId in tabs) {
          const tabBtn = document.getElementById(tabId);
          const content = document.getElementById(tabs[tabId]);
          tabBtn.classList.remove('active-tab');
          content.classList.add('hidden');
        }
        document.getElementById(activeTabId).classList.add('active-tab');
        document.getElementById(tabs[activeTabId]).classList.remove('hidden');
    }

    for (let tabId in tabs) {
        document.getElementById(tabId).addEventListener('click', () => setActiveTab(tabId));
    }

    const newClientBtn = document.querySelector('#clients-content button');
    const newProviderBtn = document.querySelector('#providers-content button');
    const newVentaBtn = document.querySelector('#sales-content button');
    const clientForm = document.getElementById('client-form');
    const providerForm = document.getElementById('prove-form');
    const ventaForm = document.getElementById('venta-form');
    const cancelClient = document.getElementById('cancel-client');
    const cancelProvider = document.getElementById('cancel-prove');
    const cancelVenta = document.getElementById('cancel-venta');

    if (newClientBtn && clientForm && cancelClient) {
        newClientBtn.addEventListener('click', () => clientForm.classList.remove('hidden'));
        cancelClient.addEventListener('click', () => clientForm.classList.add('hidden'));
    }
    if (newProviderBtn && providerForm && cancelProvider) {
        newProviderBtn.addEventListener('click', () => providerForm.classList.remove('hidden'));
        cancelProvider.addEventListener('click', () => providerForm.classList.add('hidden'));
    }
    if (newVentaBtn && ventaForm && cancelVenta) {
        newVentaBtn.addEventListener('click', () => ventaForm.classList.remove('hidden'));
        cancelVenta.addEventListener('click', () => ventaForm.classList.add('hidden'));
    }
});
