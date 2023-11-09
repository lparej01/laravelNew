var setInnerHTML = function (elm, html) {
    elm.innerHTML = html;
    Array.from(elm.querySelectorAll("script")).forEach((oldScript) => {
        const newScript = document.createElement("script");
        Array.from(oldScript.attributes).forEach((attr) =>
            newScript.setAttribute(attr.name, attr.value)
        );
        newScript.appendChild(document.createTextNode(oldScript.innerHTML));
        oldScript.parentNode.replaceChild(newScript, oldScript);
    });
};
class TableControlles {
    #REMOTE_LOAD_CONTENT_TRIGGER = "load-remote-content-trigger";
    #REMOTE_CONTENT_URL = "url-remote-content";
    #MODAL_CONTENT_DUMP_ELEMENT = "[data-modal-content]";

    constructor($tableInstanceInUse) {
        this.$tableInstanceInUse = $tableInstanceInUse;
        this.operateEvents = {};
        this.idRow;
        this.conditionals = [];
    }

    conditionalRow(agr) {
        this.conditionals.push(agr);
    }

    getConditionalRow() {
        return this.conditionals;
    }

    setConditions(agr) {
        let newAgr = agr
            .map((value) => {
                let key = "";
                let arry = [];
                let if$ = this.conditionals.filter((el) => {
                    key = value.name;
                    return { ...el[value.name] };
                });
                console.log(
                    "🚀 ~ file: useTables.js:39 ~ TableControlles ~ .map ~ arry:",
                    arry
                );
                console.log(
                    "🚀 ~ file: useTables.js:38 ~ TableControlles ~ .map ~ key:",
                    key
                );
                console.log(
                    "🚀 ~ file: useTables.js:43 ~ TableControlles ~ letif$=this.conditionals.filter ~ if:",
                    if$
                );

                if (if$.length) {
                    arry = if$.map((vl) => {
                        if (vl[key]) return value;
                    });

                    return arry;
                }
                return value;
            })
            .reduce((a, b) => {
                if (b.length) {
                    return [...a, ...b];
                } else return [...a];
            }, []);

        return newAgr.filter((el) => el != undefined);
    }

    setIdRow(id) {
        this.idRow = id;
    }

    onDeleteTableRow({ field, values }) {
        this.$tableInstanceInUse.bootstrapTable("remove", {
            field,
            values,
        });
        return this.$tableInstanceInUse;
    }

    /**
     * @param {object} eventDefinition
     * @param {keyof HTMLElementEventMap} eventDefinition.event
     * @param {string} eventDefinition.elementSelector
     * @param {Function} eventDefinition.fun
     */
    onDefineOperateEvents({ event, elementSelector, fun }) {
        let key = `${event} ${elementSelector}`.toString();
        this.operateEvents[key] = fun;
        return this.$tableInstanceInUse;
    }

    onCreateActions({ actions, container }) {
        let newDiv = document.createElement("div");
        let newDivFanton = document.createElement("div");
        container.class.split(",").forEach((className) => {
            newDiv.classList.add(className);
        });

        actions.forEach((el) => {
            newDiv.appendChild(this.createElemente(el));
        });
        newDivFanton.appendChild(newDiv);

        return newDivFanton.innerHTML;
    }

    /**
     * @param {object} columDeclaration
     * @param {string} columDeclaration.aClass - comma separated element handle classes
     * @param {string} columDeclaration.iClass - comma separated element Handle content classes
     * @param {string?} columDeclaration.href
     * @param {object} columDeclaration.modal
     * @param {string} columDeclaration.modal.target
     * @param {string} columDeclaration.modal.toggle
     * @param {string?} columDeclaration.modal.url
     * @returns {HTMLElement}
     */
    createElemente({ aClass, iClass, href, modal, tooltip }) {
        let handlerElement = this.#createElementWithClasses(
            href ? "a" : "button",
            aClass.split(",")
        );

        let newIcon = this.#createElementWithClasses("i", iClass.split(","));

        handlerElement.appendChild(newIcon);

        if (href) handlerElement.setAttribute("href", href);

        if (tooltip) {
            handlerElement.setAttribute("data-bs-toggle", tooltip.toggle);
            handlerElement.setAttribute("data-bs-placement", tooltip.placement);
            handlerElement.setAttribute("title", tooltip.title);
        }

        const isRemoteContentModal = modal && "url" in modal;

        if (isRemoteContentModal) {
            this.#setURLToElement(handlerElement, modal.url);
            this.#setRemoteContentSelector(handlerElement);
            this.#setToggleModalToElement(handlerElement, modal);
            //this.#setLoadModalContentOnClick(modal.target)
        }
        return handlerElement;
    }
    // #setShowModal(modal, href){
    //     const targetElement = document.querySelector(modal.target)
    //     debugger
    //     href.addEventListener(
    //         "click",
    //         async () => {
    //             const content = await this.#getContentFromURL(url)
    //             this.#addContentToElement(targetElement, content)
    //             new bootstrap.Modal(targetElement).show()
    //         }
    //     )
    // }
    // async #addContentToElement(target, content){
    //     target.querySelector("[data-modal-content]").innerHTML = content;
    // }
    #setToggleModalToElement(element, modalOptions) {
        element.setAttribute("data-bs-toggle", modalOptions.toggle);
        element.setAttribute("data-bs-target", modalOptions.target);
    }
    async #getContentFromURL(url) {
        return (await axios.get(url)).data;
    }
    /**
     * @param {keyof HTMLElementTagNameMap} elementTag
     * @param {string[]} classes
     * @returns {HTMLElement}
     */
    #createElementWithClasses(elementTag, classes) {
        const element = document.createElement(elementTag);
        classes.forEach((class_) => element.classList.add(class_));
        return element;
    }
    /**
     * @param {HTMLElement} element
     * @param {string} url
     */
    #setURLToElement(element, url) {
        element.setAttribute(this.#REMOTE_CONTENT_URL, url);
    }
    /**
     * @param {HTMLElement} element
     */
    #setRemoteContentSelector(element) {
        element.setAttribute(this.#REMOTE_LOAD_CONTENT_TRIGGER, true);
    }
    setLoadModalContentOnClick(targetModal) {
        /** @type {HTMLElement?} */
        const modalElement = document.querySelector(targetModal);
        const dumpContentElement = modalElement?.querySelector(
            this.#MODAL_CONTENT_DUMP_ELEMENT
        );
        if (!dumpContentElement)
            return console.warn(
                `${
                    this.#MODAL_CONTENT_DUMP_ELEMENT
                } not exist in ${targetModal}`
            );

        /**
         * @param {object} event
         * @param {HTMLElement} event.currentTarget
         */
        const clickListener = async ({ currentTarget }) => {
            const url = currentTarget.getAttribute(this.#REMOTE_CONTENT_URL);
            const content = await this.#getContentFromURL(url);
            setInnerHTML(dumpContentElement, content);
            // dumpContentElement.appendChild(element)
        };

        this.onDefineOperateEvents({
            event: "click",
            elementSelector: `[${this.#REMOTE_LOAD_CONTENT_TRIGGER}]`,
            fun: clickListener,
        });
    }
}
